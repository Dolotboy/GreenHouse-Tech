using System;
using System.Collections.Generic;

namespace OutilImportation
{
    class Program
    {
        static List<Plant> veggies = new List<Plant>();
        static List<Problem> problems = new List<Problem>();

        static void Main(string[] args)
        {
            string env = "http://localhost:8000/api/";
            //string env = "https://testenv.apipcst.xyz/api/";
            //string env = "http://apipcst.xyz/api/";
            //string env = "http://10.10.177.18/Aide_Decision/public/api/";
            if (args.Length > 0)
                env = args[0];

            ExcelLoader.LoadProblems(problems);
            ExcelLoader.LoadVeggies(veggies, problems);
            HttpHelper.PushData(env, problems, veggies);

            Interface.ReadKey();
        }
    }
}
