using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace OutilImportation
{
    internal class Vegetal
    {
        public string Saison;
        public string TypeVegetal;
        public string NomVegetal;
        public string JoursConservation;
        public string Fonctionnement;

        public override string ToString()
        {
            return $"INSERT INTO tblVegetal (saison, typeVegetal, nomVegetal, joursConservation, fonctionnement) " +
                   $"VALUES ({Saison}, {TypeVegetal},{NomVegetal},{JoursConservation},{Fonctionnement})";
        }
    }
}
