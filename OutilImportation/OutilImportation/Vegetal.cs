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

        public override string ToString()
        {
            string tblPlant = $"INSERT INTO tblPlant (plantName, plantType, groundType, daysConservation, functioning)" +
                              $"VALUES ('{Name}','{Type}','{GroundType}',{ConservationDays},'{Comment}');";
            string temp = $"INSERT INTO tblRangeFavorableConditionNb (rangeType, min, max, unit) VALUES ('temperature',{TempMin},{TempMax},'°C');";
            string hum = $"INSERT INTO tblRangeFavorableConditionNb (rangeType, min, max, unit) VALUES ('humidity',{HumidityMin},{HumidityMax},'%');";
            string lengthBetweenPlants = $"INSERT INTO tblRangeFavorableConditionNb (rangeType, min, max, unit) VALUES ('plantsSpacing','{LengthBetweenPlantsMin}','{LengthBetweenPlantsMax}','cm');";
            string declareTempId = $"SET @tempId = (SELECT idRangeNb FROM tblRangeFavorableConditionNb ORDER BY idRangeNb DESC LIMIT 1);";
            string declareHumId = $"SET @humId = (SELECT idRangeNb FROM tblRangeFavorableConditionNb ORDER BY idRangeNb DESC LIMIT 1);";
            string declareLengthId = $"SET @lengthId = (SELECT idRangeNb FROM tblRangeFavorableConditionNb ORDER BY idRangeNb DESC LIMIT 1);";
            string declarePlantId = $"SET @plantId = (SELECT idPlant FROM tblPlant ORDER BY idPlant DESC LIMIT 1);";
            string insertForeigns = $"INSERT INTO tblPlant_tblRangeFavorableConditionNb (tblPlant_idPlant, tblDateRangeFavorableCondition_idRangeNb) " +
                                    $"VALUES (@plantId, @tempId);\n" +
                                    $"INSERT INTO tblPlant_tblRangeFavorableConditionNb (tblPlant_idPlant, tblDateRangeFavorableCondition_idRangeNb) " +
                                    $"VALUES (@plantId, @humId);\n" +
                                    $"INSERT INTO tblPlant_tblRangeFavorableConditionNb (tblPlant_idPlant, tblDateRangeFavorableCondition_idRangeNb) " +
                                    $"VALUES (@plantId, @lengthId);\n";

            return $"{temp} \n {declareTempId} \n {hum} \n {declareHumId} \n {lengthBetweenPlants} \n {declareLengthId} \n {tblPlant} \n {declarePlantId} \n {insertForeigns} \n";
        }

        public PropertyInfo[] GetProperties()
        {
            return typeof(Vegetal).GetProperties();
        }
    }
}
