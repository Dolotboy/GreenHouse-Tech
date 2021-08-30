using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;
using Excel = Microsoft.Office.Interop.Excel;

namespace OutilImportation
{
    class Program
    {
        static string baseDir = Directory.GetCurrentDirectory().Split(new string[] {"bin"}, StringSplitOptions.None)[0];

        static void Main(string[] args)
        {
            List<Vegetal> veggies = new List<Vegetal>();
            LoadVeggies(veggies);
            SaveFiles(veggies);
        }

        static void LoadVeggies(List<Vegetal> veggies)
        {
            Excel.Application app = new Excel.Application();
            Excel.Workbook wb = app.Workbooks.Open(baseDir + "infoleg.xlsx");
            Excel.Worksheet ws = (Excel.Worksheet)wb.Sheets[1];
            Excel.Range range = ws.UsedRange;

            for (int i = 1; i < range.Rows.Count; i++)
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
    }
}
