using System;
using System.Collections.Generic;
using System.Linq;
using System.IO;
using Excel = Microsoft.Office.Interop.Excel;
using System.Linq;

namespace OutilImportation
{
    class ExcelLoader
    {
        static string baseDir = Directory.GetCurrentDirectory();
        static int dataVersion = 3;

        public static void LoadVeggies(List<Plant> veggies, List<Problem> problems)
        {
            Excel.Application app = new Excel.Application();
            Excel.Workbook wb = app.Workbooks.Open(baseDir + $"\\Data\\veggies_{dataVersion}.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;
            int i = 2;

            while (ConvertCellToString(range.Cells[i, 1]) != "empty")
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
                int plantLocalId = Convert.ToInt32(ConvertCellToString(range.Cells[i, 23]));
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
                    plantLocalId = plantLocalId,
                    updated_at = now,
                    create_at = now,
                    conditionsNbs = conds,
                    problems = problems.Where(x => x.Plants.Contains(plantLocalId)).ToList()
                };
                veggies.Add(veg);
                if (i % 5 == 0)
                    Interface.WriteLine($"Loaded {i} vegetals");
                i++;
            }
            wb.Close();
            app.Quit();
        }

        public static void LoadProblems(List<Problem> problems)
        {
            Excel.Application app = new Excel.Application();
            Excel.Workbook wb = app.Workbooks.Open(baseDir + $"\\Data\\problems_{dataVersion}.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;
            int i = 2;

            while (ConvertCellToString(range.Cells[i, 1]) != "empty")
            {
                string now = DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss");
                Problem problem = new Problem()
                {
                    problemName = ConvertCellToString(range.Cells[i, 1]),
                    problemType = ConvertCellToString(range.Cells[i, 2]),
                    problemSolution = ConvertCellToString(range.Cells[i, 3]),
                    Plants = ParsePlants(ConvertCellToString(range.Cells[i, 4])),
                    Created_at = now,
                    Updated_at = now
                };
                problems.Add(problem);

                if (i % 5 == 0)
                    Interface.WriteLine($"Loaded {i} problems");
                i++;
            }
            wb.Close();
            app.Quit();
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

        static List<int> ParsePlants(string cellContent)
        {
            List<int> plantIds = new List<int>();
            try
            {
                string[] ids = cellContent.Split(',');
                foreach (string id in ids)
                    plantIds.Add(Convert.ToInt32(id));
            }
            catch (Exception e)
            {
                Interface.WriteLine(e.Message);
            }
            return plantIds;
        }
    }
}
