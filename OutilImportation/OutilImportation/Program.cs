using System;
using System.Collections.Generic;
using System.IO;
using Excel = Microsoft.Office.Interop.Excel;
using System.Net.Http;
using Newtonsoft.Json;

namespace OutilImportation
{
    class Program
    {
        static string baseDir = Directory.GetCurrentDirectory().Split(new string[] { "bin" }, StringSplitOptions.None)[0];

        static void Main(string[] args)
        {
            string env = "apitestenv";
            if (args.Length > 0)
                env = "api";

            List<Plant> veggies = new List<Plant>();
            LoadVeggies(veggies);
            //PushData($"https://{env}.pcst.xyz/api/new/plant/addPlant", veggies);
            PushData($"http://localhost:8000/api/new/plant/addPlant", veggies);

            Interface.ReadKey();
        }

        static void LoadVeggies(List<Plant> veggies)
        {
            Excel.Application app = new Excel.Application();
            Excel.Workbook wb = app.Workbooks.Open(baseDir + "veggies.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;

            for (int i = 2; i < 10; i++)
            {
                if (ConvertCellToString(range.Cells[i, 1]) == "")
                    break;

                string now = DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss");
                List<ConditionNb> conds = new List<ConditionNb>()
                {
                    new ConditionNb(){type = "temperature", min = ConvertCellToString(range.Cells[i, 2], true), max = ConvertCellToString(range.Cells[i, 3], true), unit = "°C", create_at = now, updated_at = now},
                    new ConditionNb(){type = "humidity", min = ConvertCellToString(range.Cells[i, 4], true), max = ConvertCellToString(range.Cells[i, 5], true), unit = "%", create_at = now, updated_at = now},
                    new ConditionNb(){type = "ph", min = ConvertCellToString(range.Cells[i, 15], true), max = ConvertCellToString(range.Cells[i, 16], true), unit = "", create_at = now, updated_at = now},
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

        static async void PushData(string url, List<Plant> veggies)
        {
            try
            {
                using (HttpClient client = new HttpClient())
                {
                    foreach (Plant veg in veggies)
                    {
                        StringContent content = new StringContent(veg.ToString());
                        Interface.WriteLine(veg.ToString());
                        HttpResponseMessage response = await client.PostAsync(url, content);
                        string responseString = await response.Content.ReadAsStringAsync();
                        Response plantResponse = JsonConvert.DeserializeObject<Response>(responseString);
                        Interface.WriteLine(plantResponse.id);
                        if(plantResponse.success)
                            foreach(ConditionNb cond in veg.conditionsNbs)
                            {
                                StringContent content2 = new StringContent(cond.ToString());
                                HttpResponseMessage response2 = await client.PostAsync("http://localhost:8000/api/new/condition/addFavCondition/2", content2);
                                string responseString2 = await response2.Content.ReadAsStringAsync();
                                Response condResponse = JsonConvert.DeserializeObject<Response>(responseString2);
                                response = await client.PostAsync($"http://localhost:8000/api/assign/condition/2/{plantResponse.id}/{condResponse.id}", new StringContent(""));
                                Interface.WriteLine(condResponse.id);
                            }
                        Interface.WriteLine(responseString);
                    }
                }
                Interface.WriteLine("Everything was pushed.");
            }
            catch(Exception e)
            {
                Interface.WriteLine(e.Message);
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
