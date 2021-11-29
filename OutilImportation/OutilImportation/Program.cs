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
        static DateTime lastApiCall = default(DateTime);
        static double apiCallInterval = 2;

        static void Main(string[] args)
        {
            string env = "http://localhost:8000/api/";
            //string env = "https://testenv.apipcst.xyz/api/";
            //string env = "http://apipcst.xyz/api/";
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
            Excel.Workbook wb = app.Workbooks.Open(baseDir + "veggies_2.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;
            int i = 2;

            while(ConvertCellToString(range.Cells[i, 1]) != "empty")
            { 
                string now = DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss");
                List<ConditionNb> conds = new List<ConditionNb>()
                {
                    new ConditionNb(){type = "temperature", min = ConvertCellToString(range.Cells[i, 11], true), max = ConvertCellToString(range.Cells[i, 12], true), unit = "°C", create_at = now, updated_at = now},
                    new ConditionNb(){type = "humidity", min = ConvertCellToString(range.Cells[i, 13], true), max = ConvertCellToString(range.Cells[i, 14], true), unit = "%", create_at = now, updated_at = now},
                    new ConditionNb(){type = "ph", min = ConvertCellToString(range.Cells[i, 19], true), max = ConvertCellToString(range.Cells[i, 20], true), unit = "ph", create_at = now, updated_at = now},
                    new ConditionNb(){type = "plantSpacing", min = ConvertCellToString(range.Cells[i, 16], true), max = ConvertCellToString(range.Cells[i, 17], true), unit = "cm", create_at = now, updated_at = now},
                    new ConditionNb(){type = "exposureTime", min = ConvertCellToString(range.Cells[i, 21], true), max = ConvertCellToString(range.Cells[i, 22], true), unit = "°H", create_at = now, updated_at = now},
                };
                Plant veg = new Plant()
                {
                    plantImg = ConvertCellToString(range.Cells[i, 1]),
                    plantName = ConvertCellToString(range.Cells[i, 2]),
                    plantType = ConvertCellToString(range.Cells[i, 3]),
                    plantFamily = ConvertCellToString(range.Cells[i, 4]),
                    plantSeason = ConvertCellToString(range.Cells[i, 5]),
                    plantGroundType = ConvertCellToString(range.Cells[i, 6]),
                    plantDaysConservation = ConvertCellToString(range.Cells[i, 7], true),
                    plantDescription = ConvertCellToString(range.Cells[i, 8]),
                    plantDifficulty = ConvertCellToString(range.Cells[i, 9]),
                    plantBestNeighbor = ConvertCellToString(range.Cells[i, 10]),
                    conditionsNbs = conds
                };
                veggies.Add(veg);
                if (i % 5 == 0)
                    Interface.WriteLine($"Loaded {i} vegetals");
                i++;
            }
            wb.Close();
            app.Quit();
        }

        static HttpClient GenerateClient()
        {
            HttpClient client = new HttpClient();
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
            client.DefaultRequestHeaders.Add("Authorization", "Basic " + System.Convert.ToBase64String(Encoding.GetEncoding("ISO-8859-1").GetBytes("admin@pcst.xyz" + ":" + "PcstAdmin2021")));
            return client;
        }

        static async void PushData(string baseUrl, List<Plant> veggies)
        {
            try
            {
                foreach (Plant veg in veggies)
                    await PushPlant(baseUrl, veg, GenerateClient());
                Interface.WriteLine("Everything was pushed.");
            }
            catch (Exception e)
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
                    Response condResponse = await PostContent($"{baseUrl}new/condition/addFavCondNb", new StringContent(cond.ToString(), Encoding.UTF8, "application/json"), client);
                    if (condResponse.success)
                    {
                        Interface.WriteLine($"Range #{condResponse.id} added successfully");
                        Response assignResponse = await PostContent($"{baseUrl}assign/condition/nb/{plantResponse.id}/{condResponse.id}", new StringContent("", Encoding.UTF8, "application/json"), client);
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
                double secondsSinceLastAPICall = (DateTime.Now - lastApiCall).TotalSeconds;
                if (lastApiCall != default(DateTime) && secondsSinceLastAPICall < apiCallInterval)
                    await Task.Delay(TimeSpan.FromSeconds((apiCallInterval - secondsSinceLastAPICall)));

                HttpResponseMessage response = await client.PostAsync(url, content);
                responseString = await response.Content.ReadAsStringAsync();
                lastApiCall = DateTime.Now;
                Response test = JsonConvert.DeserializeObject<Response>(responseString);

                return JsonConvert.DeserializeObject<Response>(responseString);
            }
            catch (Exception e)
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
