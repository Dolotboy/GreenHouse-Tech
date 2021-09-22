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
import toolbox from './toolbox.js'
import Login from './components/Login.vue'
import $ from '../node_modules/jquery/dist/jquery.js'

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
      let db = await toolbox.setDb();
      
      this.plants = await toolbox.fetchData(db);
      if(this.plants.length > 0)
        return;
      this.plants = [];
      
      this.plants = await this.GetAllPlants("http://apitestenv.pcst.xyz/api/searchAll/plant");
      //await this.GetAllPlants("http://localhost:8000/api/searchAll/plant/3");
      //await this.GetAllPlants("http://apitestenv.pcst.xyz/api/search/plant/3");
      
      let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
      let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");;
      for(let i = 0; i < this.plants.length; i++){
        entrepot.add(toolbox.GeneratePlant(this.plants[i]));
      }

      this.plants = null;
      this.plants = await toolbox.fetchData(db);
    },
    GetAllPlants(url){
    return new Promise(resolve => {
      $.get(url, function(donnees, status){
        let json = JSON.parse(donnees);
        let plants = [];
        for(let i = 0; i< json.length; i++)
          plants.push(json[i]);
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
