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
            return $"INSERT INTO tblVegetal (conservationDays, type,name, comment, tempMin, tempMax, humidityMin, humidityMax, Light, LengthBetweenPlantsMin" +
                   $"LengthBetweenPlantsMax, MaturationDays, GroundType, eighborhood)n " +
                   $"VALUES ({ConservationDays},{Type},{Name},{Comment},{TempMin},{TempMax},{HumidityMin},{HumidityMax},{Light}," +
                   $"{LengthBetweenPlantsMin},{LengthBetweenPlantsMax},{MaturationDays},{GroundType}, {Neighborhood})";
        }

        public PropertyInfo[] GetProperties()
        {
            return typeof(Vegetal).GetProperties();
        }
    }
}
