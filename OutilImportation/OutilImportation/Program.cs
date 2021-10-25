using System;
using System.Collections.Generic;
using System.IO;
using Excel = Microsoft.Office.Interop.Excel;
using System.Net.Http;
using Newtonsoft.Json;
using System.Threading.Tasks;
using System.Net.Http.Headers;
using System.Text;

namespace OutilImportation
{
    class Program
    {
        static string baseDir = Directory.GetCurrentDirectory().Split(new string[] { "bin" }, StringSplitOptions.None)[0];

        static void Main(string[] args)
        {
            string env = "http://testenv.apipcst.xyz/api/";
            if (args.Length > 0)
                env = args[0];

            List<Plant> veggies = new List<Plant>();
            LoadVeggies(veggies);
            PushData(env, veggies);

            Interface.ReadKey();
        }

        static void LoadVeggies(List<Plant> veggies)
        {
            Excel.Application app = new Excel.Application();
            Excel.Workbook wb = app.Workbooks.Open(baseDir + "veggies.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;

            for (int i = 2; i < 15; i++)
            {
                if (ConvertCellToString(range.Cells[i, 1]) == "")
                    break;

                string now = DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss");
                List<ConditionNb> conds = new List<ConditionNb>()
                {
                    new ConditionNb(){type = "temperature", min = ConvertCellToString(range.Cells[i, 2], true), max = ConvertCellToString(range.Cells[i, 3], true), unit = "°C", create_at = now, updated_at = now},
                    new ConditionNb(){type = "humidity", min = ConvertCellToString(range.Cells[i, 4], true), max = ConvertCellToString(range.Cells[i, 5], true), unit = "%", create_at = now, updated_at = now},
                    new ConditionNb(){type = "ph", min = ConvertCellToString(range.Cells[i, 15], true), max = ConvertCellToString(range.Cells[i, 16], true), unit = "ph", create_at = now, updated_at = now},
                    new ConditionNb(){type = "plantSpacing", min = ConvertCellToString(range.Cells[i, 7], true), max = ConvertCellToString(range.Cells[i, 8], true), unit = "cm", create_at = now, updated_at = now},
                };
                Plant veg = new Plant()
                {
                    plantImg = "empty",
                    plantName = ConvertCellToString(range.Cells[i, 1]),
                    plantType = ConvertCellToString(range.Cells[i, 14]),
                    plantFamily = "empty",
                    plantSeason = "empty",
                    plantGroundType = ConvertCellToString(range.Cells[i, 12]),
                    plantDaysConservation = ConvertCellToString(range.Cells[i, 13], true),
                    plantDescription = ConvertCellToString(range.Cells[i, 11]),
                    plantDifficulty = "1",
                    plantBestNeighbor = ConvertCellToString(range.Cells[i, 10]),
                    conditionsNbs = conds
                };
                veggies.Add(veg);
                if (i % 5 == 0)
                    Interface.WriteLine($"Loaded {i} vegetals");
            }
            wb.Close();
            app.Quit();
        }

        static async void PushData(string baseUrl, List<Plant> veggies)
        {
            try
            {
                using (HttpClient client = new HttpClient())
                {
                    client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
                    foreach (Plant veg in veggies)
                        await PushPlant(baseUrl, veg, client);
                }
                Interface.WriteLine("Everything was pushed.");
            }
            catch(Exception e)
            {
                Interface.WriteLine(e.Message);
            }
        }

        static async Task PushPlant(string baseUrl, Plant plant, HttpClient client)
        {
            Response plantResponse = await PostContent($"{baseUrl}new/plant/addPlant", new StringContent(plant.ToString(), Encoding.UTF8, "application/json"), client);
            if (plantResponse.success)
            {
                Interface.WriteLine($"\nPlant #{plantResponse.id} added successfully");
                foreach (ConditionNb cond in plant.conditionsNbs)
                {
                    Response condResponse = await PostContent($"{baseUrl}new/condition/addFavCondition/2", new StringContent(cond.ToString(), Encoding.UTF8, "application/json"), client);
                    if (condResponse.success)
                    {
                        Interface.WriteLine($"Range #{condResponse.id} added successfully");
                        Response assignResponse = await PostContent($"{baseUrl}assign/condition/2/{plantResponse.id}/{condResponse.id}", new StringContent("", Encoding.UTF8, "application/json"), client);
                        if (assignResponse.success)
                            Interface.WriteLine($"Range #{condResponse.id} assigned successfully to plant #{plantResponse.id}");
                        else
                            Interface.WriteLine(assignResponse.ToString());
                    }
                    else
                        Interface.WriteLine(condResponse.ToString());
                }
            }
            else
                Interface.WriteLine("\n" + plantResponse.ToString());
        }

        static async Task<Response> PostContent(string url, StringContent content, HttpClient client)
        {
            string responseString;
            try
            {
                HttpResponseMessage response = await client.PostAsync(url, content);
                responseString = await response.Content.ReadAsStringAsync();
                return JsonConvert.DeserializeObject<Response>(responseString);
            }
            catch(Exception e)
            {
                return new Response() { id = "-1", message = $"{e.Message}\n{e.InnerException}", success = false };
            }
        }

        static string ConvertCellToString(Excel.Range cell, bool shouldRemoveCommas = false)
        {
            if (cell.Value == null)
                return "empty";
            if (shouldRemoveCommas)
                return RemoveComas(cell.Value.ToString().Replace("\'", "\'\'"));
            return cell.Value.ToString().Replace("\'", "\'\'");
        }

        static string RemoveComas(string str)
        {
            return str.Replace(",", ".");
        }
    }
}
