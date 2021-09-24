<template>
  <div class="logo">
    <img src="../../Images/LogoV1.png">
  </div>
    <div class="productsGrid">
      <Plant class="plant" @click="toggleDetails(plant.idPlant - 1)" v-for='plant in plants' :plant="plant"/>
    </div>
    <Details @close="toggleDetails" v-if="showDetails" :plant="detailedPlant"/>
</template>

<script>
import Details from '../components/Details.vue'
import Plant from '../components/Plant.vue'
import $ from '../../node_modules/jquery/dist/jquery.js'

export default {
  name: 'Home',
  components:{
    Details,
    Plant
  }, 
  data(){
    return {
      plants : [],
      detailedPlant : Object,
      showDetails : false
    }
  },
  mounted(){
    this.initialisation();
  },
  methods : {
    toggleDetails(num){
      this.showDetails = !this.showDetails;
      this.detailedPlant = this.plants[num];
    },
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
body{
  background-color: #292929;
}
.logo{
  margin-top: 1%;
  height: 10vh;
}
.logo img{
  max-height: 100%;
  max-width: 100%;
}
.productsGrid{
  color: #D2CCB1;
  display : grid;
  grid-template-columns: 50% 50%;
  width : 100%;
  margin-top: 1%;
  background-color: #616161;
}

.plant:hover{
  background-color : #600404;
  cursor : pointer;
}
</style>