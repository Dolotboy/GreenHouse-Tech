using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;
using Excel = Microsoft.Office.Interop.Excel;
using System.Reflection;

namespace OutilImportation
{
    class Program
    {
        static string baseDir = Directory.GetCurrentDirectory().Split(new string[] { "bin" }, StringSplitOptions.None)[0];

        static void Main(string[] args)
        {
            string bd = "u882331052_apitestenv";
            if (args.Length > 0)
                bd = "u882331052_wiki";

            List<Vegetal> veggies = new List<Vegetal>();
            LoadVeggies(veggies);
            SaveFiles(veggies, bd);
            string jsonTest = CreateTestJson(veggies);
            SaveTestJson(jsonTest);
        }

        static void LoadVeggies(List<Vegetal> veggies)
        {
            Excel.Application app = new Excel.Application();
            Excel.Workbook wb = app.Workbooks.Open(baseDir + "infoleg.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;

            for (int i = 2; i < 1000; i++)
            {
                if (ConvertCellToString(range.Cells[i, 1]) == "")
                    break;

                Vegetal veg = new Vegetal()
                {
                    Name = ConvertCellToString(range.Cells[i, 1]),
                    TempMin = ConvertCellToString(range.Cells[i, 2]),
                    TempMax = ConvertCellToString(range.Cells[i, 3]),
                    HumidityMin = ConvertCellToString(range.Cells[i, 4]),
                    HumidityMax = ConvertCellToString(range.Cells[i, 5]),
                    Light = ConvertCellToString(range.Cells[i, 6]),
                    LengthBetweenPlantsMin = ConvertCellToString(range.Cells[i, 7]),
                    LengthBetweenPlantsMax = ConvertCellToString(range.Cells[i, 8]),
                    MaturationDays = ConvertCellToString(range.Cells[i, 9]),
                    Neighborhood = ConvertCellToString(range.Cells[i, 10]),
                    Comment = ConvertCellToString(range.Cells[i, 11]),
                    GroundType = ConvertCellToString(range.Cells[i, 12]),
                    ConservationDays = ConvertCellToString(range.Cells[i, 13]),
                    Type = ConvertCellToString(range.Cells[i, 14]),
                    PHMin = ConvertCellToString(range.Cells[i,15]),
                    PHMax = ConvertCellToString(range.Cells[i,16])
                };
                veggies.Add(veg);
                if (i % 5 == 0)
                    Console.WriteLine($"Loaded {i} vegetals");
            }
            wb.Close();
            app.Quit();
        }

        static string ConvertCellToString(Excel.Range cell)
        {
            if (cell.Value == null)
                return "";
            return cell.Value.ToString().Replace("\'", "\'\'");
        }

        static void SaveFiles(List<Vegetal> veggies, string bd)
        {

            StreamWriter writer = new StreamWriter(baseDir + "statements.txt");
            writer.WriteLine($"USE {bd};");
            foreach (Vegetal veg in veggies)
                writer.WriteLine(veg.ToString());
            writer.Close();
        }

        static string CreateTestJson(List<Vegetal> veggies)
        {
            string jsonContent = "{ \n\"vegetals\":[";
            foreach (Vegetal veg in veggies)
            {
                PropertyInfo[] props = veg.GetProperties();
                for (int i = 0; i < 50; i++)
                {
                    jsonContent += "\n\n{";
                    for(int j = 0; j < props.Length; j++)
                    {
                        jsonContent += "\n\t\"" + props[j].ToString().Split(' ')[1] + "\" : \"" + props[j].GetValue(veg) + "\"";
                        if (j != props.Length - 1)
                            jsonContent += ",";
                    }
                    jsonContent += "\n},";
                }
            }
            return jsonContent += "\n]\n}";
        }

        static void SaveTestJson(string jsonContent)
        {
            StreamWriter writer = new StreamWriter(baseDir + "JsonContent.json");
            writer.WriteLine(jsonContent);
            writer.Close();
        }
    }
}
