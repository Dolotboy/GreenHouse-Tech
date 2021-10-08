using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace OutilImportation
{
    public class ConditionNb
    {
        public int idRangeNb { get; set; }
        public string type { get; set; }
        public float min { get; set; }
        public float max { get; set; }
        public string unit { get; set; }
        public DateTime create_at { get; set; }
        public DateTime updated_at { get; set; }
    }
}
