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
import Problem from './components/Problem.vue'
import $ from '../node_modules/jquery/dist/jquery.js'

export default {
  components :{
    Login,
    Register,
    Problem
  },
  data(){
      return{
          envBack : "http://localhost:8000/",
          env : "http://apipcst.xyz/",
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
        await this.DownloadContent();
      }     
      this.plants = await toolbox.fetchData(await toolbox.setDb());
      if(this.plants.length == 0)
        await this.DownloadContent();   
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
      console.log(this.plants);
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

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: black;
}
*{
  box-sizing: border-box;
}

html{
  font-size : 10pt;
}

button{
  background-color: black;
  color : white;
  border : none;
  padding : 10px;
  font-size : 1.2rem;

  &:hover{
    opacity : .8;
    cursor : pointer;
  }
}

nav{
  position : relative;

  &> ul{
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

    li {
      float: left;
      border-right: 1px solid darkgrey;
      border-left: 1px solid darkgrey; 

      a {
        display: block;
        color: white;
        text-decoration: none;
        text-align: center;
        padding: 10px 15px;

        &:hover{
          color: black;
          background-color: #e6a800;
        }
      }
    }
  }
}
#LoginRegister :hover{
  color: #D2CCB1;
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
  color: #d8d5ca;
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
  color: #d8d5ca;
  text-decoration: none;
  text-align: center;
  padding: 10px 15px;
}
li a:hover{
  color: black;
  background-color: #e6a800;
}
.active {
  background-color : #01B0D3;
}
.lblInp-div{
  display : flex;
  justify-content : end;
  height : 2rem;
  margin : 20px 0;

  label{
    font-size : 2rem;

    &:after{
      content : " :";
    }
  }

  input{
    width : 50%;
    height : 100%;
    margin-left : 1vw;
  }
}

@media screen and (max-width : 1200px) {
  html{
    font-size : 7.5pt;
  }
  
  .lblInp-div{
    flex-direction: column;
    align-items: start;
    height : 7rem;

    input{
      width : 100% !important;
      margin : 0 !important;
    }
  }
}

@media screen and (max-width : 600px) {
  html{
    font-size : 5pt;
  }
}
</style>
