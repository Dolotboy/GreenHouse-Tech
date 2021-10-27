using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace OutilImportation
{
    public static class Interface
    {
        public static void WriteLine(object content)
        {
            Console.WriteLine(content);
        }

        public static void Write(object content)
        {
            Console.WriteLine(content);
        }

        public static void Clear()
        {
            Console.Clear();
        }

        public static string ReadLine()
        {
            return Console.ReadLine();
        }

        public static void ReadKey()
        {
            Console.ReadKey();
        }
    }
}
