<template>
  <h1>Ceci est la page d'acceuil</h1> 
    <div v-for='plant in plants'>
      <p>{{ plant.plantName }} test</p>
    </div>
</template>


<script>
import Details from '../components/Details.vue'
import $ from '../../node_modules/jquery/dist/jquery.js'

export default {
  name: 'Home',
  components:{
    Details
  }, 
  data(){
    return {
      plants : []
    }
  },
  mounted(){
    this.initialisation();
  },
  methods : {
    async initialisation(){
      let db = await this.setDb();
      this.plants = await this.fetchData(db);
    },
    fetchData(db){
      return new Promise(resolve => {
        let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
        let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");
        let requete = entrepot.getAll();
        requete.onsuccess = function(event){
          resolve(event.target.result);
        }
      })
    },
    setDb(){
      return new Promise(resolve =>{
      window.requete = indexedDB.open("GreenHouseTech",2);

      window.requete.onupgradeneeded = function(event){
            db = event.target.result;
            let options = {
                keyPath : "primaryKey",
                autoIncrement : true
            };
            let entrepot = db.createObjectStore("GreenHouseTech_Entrepot2",options);
            entrepot.createIndex("index", "primaryKey");
            resolve(db);
        }

        // Gestion des erreurs d'ouverture
        window.requete.onerror = function(event){
            console.log(event.target.errorCode);
            console.log("error");
            resolve(db);
        };

        // En cas de succès, "bd" contient la connexion
        window.requete.onsuccess = function(event){
            db = event.target.result;
            resolve(db);
        }
      });
    }
  }
}
</script>

<style>

</style>