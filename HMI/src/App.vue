<template>
  <div>
    <nav>
      <ul>
        <li><router-link to="/">Acceuil</router-link></li> 
        <li><router-link to="/about">À propos</router-link></li>
        <li><a id="btnLogin" @click="toggleLogin">Se connecter</a></li>
      </ul>
    </nav>
    <router-view/>
    <Login v-if="showLogin"/>
  </div>
</template>

<script>
import $ from '../node_modules/jquery/dist/jquery.js'
import Login from './components/Login.vue'

export default {
  components :{
    Login
  },
  data(){
      return{
          plants : [],
          showLogin : false
      }
  },
  mounted(){
      this.Initialisation()
  },
  methods :{
    toggleLogin(){
      this.showLogin = !this.showLogin;
    },
    async Initialisation(){
      let db = await this.SetDb();
      
      this.plants = await this.fetchData();
      if(this.plants.length > 0)
        return;
      this.plants = [];
      
      await this.GetAllPlants("http://apitestenv.pcst.xyz/api/searchAll/plant");
      //await this.GetAllPlants("http://localhost:8000/api/searchAll/plant/3");
      //await this.GetAllPlants("http://apitestenv.pcst.xyz/api/search/plant/3");
      
      let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
      let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");;
      for(let i = 0; i < this.plants.length; i++){
        entrepot.add(this.GeneratePlant(this.plants[i]));
      }

      this.plants = null;
      this.plants = this.fetchData();
    },
    GetAllPlants(url){
      console.log("GetAllPlants");
      let that = this;
      return new Promise(resolve => {
        $.get(url, function(donnees, status){
          let data = donnees.substring(1,donnees.length - 1);
          let json = JSON.parse(donnees);
          for(let i = 0; i< json.length; i++)
            that.plants.push(json[i]);
          resolve();
        })
      })
    },
    GeneratePlant(proxyPlant){
      return {
          plantType : proxyPlant.plantName,
          daysConservation : proxyPlant.daysConservation,
          description : proxyPlant.description,
          groundType : proxyPlant.groundType,
          idPlant : proxyPlant.idPlant,
          imgPlant : proxyPlant.imgPlant,
          plantName : proxyPlant.plantName,
          season : proxyPlant.season,
          tblPlantSowing_idSowing : proxyPlant.tblPlantSowing_idSowing
      };
    },
    fetchData(){
      return new Promise(resolve => {
        let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
        let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");
        let requete = entrepot.getAll();
        requete.onsuccess = function(event){
          resolve(event.target.result);
        }
      })
    },
    SetDb(){
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
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: black;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #4E5754 ;
  display: flex;
  justify-content: center;
}

li {
  float: left;
  border-right: 1px solid darkgrey;
  border-left: 1px solid darkgrey; 
}

li a {
  display: block;
  color: white;
  text-decoration: none;
  text-align: center;
  padding: 10px 15px;
}

li a:hover{
  background-color: black;
}

.active {
  background-color : cyan;
}

nav{
  position : relative;
}

#btnLogin{
  position : absolute;
  top : 0;
  right : 0;
}

#btnLogin:hover{
  cursor: pointer;
}

</style>
