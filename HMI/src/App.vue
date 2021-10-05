<template>
  <div>
    <nav>
      <ul>
        <div id="BasicNav">
          <li><router-link to="/">Accueil</router-link></li> 
          <li><router-link to="/about">À propos</router-link></li>
        </div>
        <div id="LoginRegister">
          <li @click="toggleRegister">S'inscrire</li>
          <li @click="toggleLogin">Se connecter</li>         
        </div>
      </ul>
    </nav>
    <router-view/>  
    <Login v-if="showLogin" @close="toggleLogin"/>
    <Register v-if="showRegister" @close="toggleRegister"/>
  </div>
</template>

<script>
import toolbox from './toolbox.js'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import $ from '../node_modules/jquery/dist/jquery.js'

export default {
  components :{
    Login,
    Register
  },
  data(){
      return{
          env : "http://localhost:8000/",
          envBack : "https://apitestenv.pcst.xyz/",
          plants : [],
          showLogin : false,
          showRegister : false,
          apiVersion : 0.0
      }
  },

  mounted(){
      this.Initialisation()
  },

  methods :{
    toggleRegister(){
      this.showRegister = !this.showRegister;
    },
    toggleLogin(){
      this.showLogin = !this.showLogin;
    },
    async Initialisation(){
      let version = localStorage.getItem('apiVersion');
      let apiVersion = await this.GetApiVersion(this.env + "api/search/last/version");
      this.plants = await this.GetAllPlants(this.env + "api/searchAll/package");

      if(version == undefined || version != apiVersion){
        await this.ClearDb();
        localStorage.setItem('apiVersion', apiVersion);
        this.DownloadContent();
      }
      
      this.plants = await toolbox.fetchData(await toolbox.setDb());
      if(this.plants.length == 0)
        this.DownloadContent();   
    },
    async ClearDb(){
      let db = await toolbox.setDb();
      toolbox.ClearDb(db);
    },
    async DownloadContent(){
      this.plants = await this.GetAllPlants(this.env + "api/searchAll/package");
      let db = await toolbox.setDb();
      let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
      let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");;
      for(let i = 0; i < this.plants.length; i++){
        entrepot.add(toolbox.GenerateObject(this.plants[i]));
      }
    },
    GetApiVersion(url){
      return new Promise(resolve =>{
        $.get(url, function(data, status){
          let json = JSON.parse(data);
          resolve(json.numVersion);
        })
      })
    },
    GetAllPlants(url){
    return new Promise(resolve => {
      $.get(url, function(donnees, status){
        let json = JSON.parse(donnees);
        let plants = [];
        for(let i = 0; i< json.length; i++){
          plants.push(json[i]);
        }
        resolve(plants);
      })
    })
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

nav > ul{
  position : relative;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #616161 ;
  display: flex;
  justify-content: center;
}

#LoginRegister :hover{
  color: white;
  background-color: #8d4705;
  cursor: pointer;
}

#LoginRegister {
  position: absolute;
  right: 0%;
  top: 0%;
}

#LoginRegister li{
  list-style-type: none;
  overflow: hidden;
  color: white;
  height: 100%;
  padding: 10px 15px;
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
  color: black;
  background-color: #e6a800
;
}

.active {
  background-color : #01B0D3;
}

nav{
  position : relative;
}


</style>
