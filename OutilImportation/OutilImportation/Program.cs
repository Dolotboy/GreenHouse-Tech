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
            List<Vegetal> veggies = new List<Vegetal>();
            LoadVeggies(veggies);
            SaveFiles(veggies);
            string jsonTest = CreateTestJson(veggies);
            SaveTestJson(jsonTest);
        }

        static void LoadVeggies(List<Vegetal> veggies)
        {
            Excel.Application app = new Excel.Application();
            Excel.Workbook wb = app.Workbooks.Open(baseDir + "infoleg.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;

            for (int i = 2; i < range.Rows.Count; i++)
            {
                Vegetal veg = new Vegetal()
                {
                    Saison = ConvertCellToString(range.Cells[i, 2]),
                    TypeVegetal = ConvertCellToString(range.Cells[i, 3]),
                    NomVegetal = ConvertCellToString(range.Cells[i, 1]),
                    JoursConservation = ConvertCellToString(range.Cells[i, 4]),
                    Fonctionnement = ConvertCellToString(range.Cells[i, 5])
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
            return cell.Value.ToString();
        }

        static void SaveFiles(List<Vegetal> veggies)
        {
            StreamWriter writer = new StreamWriter(baseDir + "statements.txt");
            foreach (Vegetal veg in veggies)
                writer.WriteLine(veg.ToString());
            writer.Close();
        }

        static string CreateTestJson(List<Vegetal> veggies)
        {
            string jsonContent = "";
            foreach (Vegetal veg in veggies)
            {
                PropertyInfo[] props = veg.GetProperties();
                for (int i = 0; i < 50; i++)
                {
                    jsonContent += "\n\n{";
                    foreach (PropertyInfo prop in props)
                        jsonContent += "\n\t\"" + prop.ToString() + "\" : \"" + prop.GetValue(veg) + "\",";
                    jsonContent += "\n}";
                }
            }
            return jsonContent;
        }

        static void SaveTestJson(string jsonContent)
        {
            StreamWriter writer = new StreamWriter(baseDir + "JsonContent.json");
            writer.WriteLine(jsonContent);
            writer.Close();
        }
    }
}
