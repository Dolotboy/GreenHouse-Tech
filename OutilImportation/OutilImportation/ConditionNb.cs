using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Newtonsoft.Json;

namespace OutilImportation
{
    public class ConditionNb
    {
        public string idRangeNb { get; set; }
        public string type { get; set; }
        public string min { get; set; }
        public string max { get; set; }
        public string unit { get; set; }
        public string create_at { get; set; }
        public string updated_at { get; set; }

        public override string ToString()
        {
            return JsonConvert.SerializeObject(this);
        }
    }
}
