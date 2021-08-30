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
        public string Saison { get; set; }
        public string TypeVegetal { get; set; }
        public string NomVegetal { get; set; }
        public string JoursConservation { get; set; }
        public string Fonctionnement { get; set; }

        public override string ToString()
        {
            return $"INSERT INTO tblVegetal (saison, typeVegetal, nomVegetal, joursConservation, fonctionnement) " +
                   $"VALUES ({Saison}, {TypeVegetal},{NomVegetal},{JoursConservation},{Fonctionnement})";
        }

        public PropertyInfo[] GetProperties()
        {
            return typeof(Vegetal).GetProperties();
        }
    }
}
