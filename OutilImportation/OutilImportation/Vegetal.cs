using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Reflection;

namespace OutilImportation
{
    public class Vegetal
    {
        public string Neighborhood { get; set; }
        public string ConservationDays { get; set; }
        public string Type { get; set; }
        public string Name { get; set; }
        public string Comment { get; set; }
        public string TempMin { get; set; }
        public string TempMax { get; set; }
        public string HumidityMin { get; set; }
        public string HumidityMax { get; set; }
        public string Light { get; set; }
        public string LengthBetweenPlantsMin { get; set; }
        public string LengthBetweenPlantsMax { get; set; }
        public string MaturationDays { get; set; }
        public string GroundType { get; set; }
        public string PHMin { get; set; }
        public string PHMax { get; set; }

        public override string ToString()
        {
            string tblPlant = $"INSERT INTO tblPlant (plantName, plantGroundType, plantDaysConservation, plantDescription, plantType)" +
                              $"VALUES ('{Name}','{GroundType}',{ConservationDays},'{Comment}', '{ Type }');";
            string temp = GetRangeNbQuery("'temperature'", TempMin, TempMax, "'°C'");
            string hum = GetRangeNbQuery("'humidity'", HumidityMin, HumidityMax, "'%'");
            string lengthBetweenPlants = GetRangeNbQuery("'plantsSpacing'", LengthBetweenPlantsMin, LengthBetweenPlantsMax, "'cm'");
            string declareTempId = GetDeclareIdQuery("tempId", "idRangeNb");
            string declareHumId = GetDeclareIdQuery("humId", "idRangeNb");
            string declareLengthId = GetDeclareIdQuery("lengthId", "idRangeNb");
            string declarePlantId = $"SET @plantId = (SELECT idPlant FROM tblPlant ORDER BY idPlant DESC LIMIT 1);";
            string insertForeigns = GetForeignQuery("plantId", "tempId") + GetForeignQuery("plantId", "humId") + GetForeignQuery("plantId", "lengthId") + GetForeignQuery("plantId", "plantId");
            //string insertChildTable = GetChildPlantQuery(Type, "plantId");

            return $"{temp} \n {declareTempId} \n {hum} \n {declareHumId} \n {lengthBetweenPlants} \n {declareLengthId} \n {tblPlant} \n {declarePlantId} \n {insertForeigns} \n";
        }

        private string GetRangeNbQuery(string type, string min, string max, string unit)
        {
            const string tblName = "tblRangeNb";
            return $"INSERT INTO {tblName} (type, min, max, unit) VALUES ({type},{min},{max},{unit});";
        }

        private string GetDeclareIdQuery(string idName, string id)
        {
            const string tblName = "tblRangeNb";
            return $"SET @{idName} = (SELECT {id} FROM {tblName} ORDER BY {id} DESC LIMIT 1);";
        }

        private string GetForeignQuery(string idPlant, string idRange)
        {
            const string tblName = "tblPlant_tblRangeNb";
            return $"INSERT INTO {tblName} (tblPlant_idPlant, tblRangeNb_idRangeNb) " +
                                    $"VALUES (@{idPlant}, @{idRange});";
        }

        private string GetChildPlantQuery(string plantType, string plantId)
        {
            if (plantType == "Fruit")
                return $"INSERT INTO tblFruit (tblPlant_idPlant) VALUES (@{plantId});";
            else
                return $"INSERT INTO tblVegetable (tblPlant_idPlant) VALUES (@{plantId});";
        }

        public PropertyInfo[] GetProperties()
        {
            return typeof(Vegetal).GetProperties();
        }
    }
}
