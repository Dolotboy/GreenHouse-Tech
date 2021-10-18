using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Reflection;
using Newtonsoft.Json;

namespace OutilImportation
{
    public class Plant : object
    {
        public string plantImg { get; set; }
        public string plantName { get; set; }
        public string plantType { get; set; }
        public string plantFamily { get; set; }
        public string plantSeason { get; set; }
        public string plantGroundType { get; set; }
        public string plantDaysConservation { get; set; }
        public string plantDescription { get; set; }
        public string plantDifficulty { get; set; }
        public string plantBestNeighbor { get; set; }
        public string create_at { get; set; }
        public string updated_at { get; set; }
        public List<ConditionNb> conditionsNbs { get; set; }

        public override string ToString()
        {
            return JsonConvert.SerializeObject(this);
        }

        public PropertyInfo[] GetProperties()
        {
            return typeof(Plant).GetProperties();
        }
    }
}
