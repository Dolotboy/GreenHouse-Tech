using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Newtonsoft.Json;

namespace OutilImportation
{
    public class Problem
    {
        public string DatabaseId { get; set; }
        public string problemName { get; set; }
        public string problemType { get; set; }
        public string problemSolution { get; set; }
        public List<int> Plants { get; set; }
        public string Created_at { get; set; }
        public string Updated_at { get; set; }

        public override string ToString()
        {
            return JsonConvert.SerializeObject(this);
        }
    }
}
