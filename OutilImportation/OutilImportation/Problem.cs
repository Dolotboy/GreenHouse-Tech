using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace OutilImportation
{
    public class Problem
    {
        public string DatabaseId { get; set; }
        public string Name { get; set; }
        public string Type { get; set; }
        public string Solution { get; set; }
        public List<int> Plants { get; set; }
        public string Created_at { get; set; }
        public string Updated_at { get; set; }
    }
}
