<template>
  <div>
    <nav id="navDesktop">
      <ul>
        <div id="BasicNav">
          <li><router-link to="/">Accueil</router-link></li> 
          <li><a href="http://apipcst.xyz" target="_blank">API Interface</a></li>
        </div>
        <div id="LoginRegister">
          <li v-if="!isLoggedIn" @click="toggleRegister">S'inscrire</li>
          <li v-if="!isLoggedIn" @click="toggleLogin">Se connecter</li>   
          <li v-if="isLoggedIn">Bonjour, {{ profile.firstName }} !</li>       
        </div>
      </ul>
    </nav>
    <nav id="navMobile">
      <div class="top-wrapper">
        <div @click="toggleNavMobile" class="hamburger-wrapper">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <ul class="links">
          <li><router-link to="/">Accueil</router-link></li> 
          <li v-if="!isLoggedIn" @click="toggleRegister">S'inscrire</li>
          <li v-if="!isLoggedIn" @click="toggleLogin">Se connecter</li> 
          <li v-if="isLoggedIn">Profile number{{ profile.idProfile }}</li> 
      </ul>
    </nav>
    <router-view @update="this.$forceUpdate" @popLogin="toggleLogin"/>  
    <div @click="login(1)">login</div>
    <div @click="logout">logout</div>
    <Login @loggedIn="login" v-if="showLogin" @close="toggleLogin"/>
    <Register v-if="showRegister" @close="toggleRegister"/>
  </div>
</template>

<script>
import toolbox from './toolbox.js'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import FavCondition from './components/FavCondition.vue'
import $ from '../node_modules/jquery/dist/jquery.js'

export default {
  components :{
    Login,
    Register,
    FavCondition
  },
  data(){
      return{
          envBack : "http://localhost:8000/",
          env : "http://testenv.apipcst.xyz/",
          plants : [],
          favorites : [],
          showLogin : false,
          showRegister : false,
          isLoggedIn : false,
          apiVersion : 0.0,
          mobileNavIsOpened : false,
          profile : Object
      }
  },
  mounted(){
      this.Initialisation()
  },
  methods :{
    login(){
      
    },
    toggleRegister(){
      this.showRegister = !this.showRegister;
    },
    toggleLogin(){
      this.showLogin = !this.showLogin;
    },
    toggleNavMobile(){
      console.log("clicked");
      let links = document.querySelector(".links");
      let navMobile = document.querySelector("#navMobile");
      let hamburger = document.querySelector(".hamburger-wrapper");
      console.log(this.mobileNavIsOpened);
      if(!this.mobileNavIsOpened){
        links.style.display = "flex";
      navMobile.style.height = "100vh"; 
      }
      else{
        console.log("else");
        links.style.display = "none";
        navMobile.style.height = "7.5vh";
      }
      
      this.mobileNavIsOpened = !this.mobileNavIsOpened;
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
    },
    async login(response){
      this.downloadFavorites(response);
      console.log(response);
      this.profile = await this.getObject(this.env + "api/search/profile/" + response.id); 
    
      localStorage.setItem('loggedInProfileId', this.profile.idProfile);
      this.isLoggedIn = true;
      this.showLogin = false;
      this.plants = this.plants;
    },
    async logout(){
      localStorage.setItem('loggedInProfileId', "");
      this.profile = null;
      this.isLoggedIn = false; 
      this.favorites = [];
      localStorage.setItem('favorites', "[]");
      this.plants = this.plants;
    },
    async getObject(url){
      return new Promise(resolve => {
        $.get(url, function(donnees, status){
          let object = JSON.parse(donnees);
          if(object.length != null && object.length != undefined && object.length >= 0)
            object = object[0];
          resolve(object);
        })
      })  
    },
    async downloadFavorites(profileId){
      this.favorites = await this.getFavorites(this.env + "api/searchAll/favorite/" + profileId);
      localStorage.setItem('favorites', JSON.stringify(this.favorites));
    },
    getFavorites(url){
      return new Promise(resolve => {
        $.get(url, function(donnees, status){
          let json = JSON.parse(donnees);
          let favorites = [];
          for(let i = 0; i< json.length; i++){
            favorites.push(json[i]);
          }
          resolve(favorites);
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

html, body{
  font-size : 10pt;
  margin : 0;
  padding : 0;
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


#navDesktop{
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
    justify-content: start;

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

#navMobile{
  display : none;
  position : relative;
  top : 0;
  left : 0;
  background: black;
  color : white;
  width : 100vw;
  height : 7.5vh;

  .top-wrapper{
    position : relative;
    top : 0;
    left : 0;
    height : 7.5vh;
  }

  .hamburger-wrapper{
      position : absolute;
      top : 50%;
      left : 0;
      display : flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-around;
      width : 10vw;
      height : 10vw;
      transform : translate(0,-50%);

      &:hover{
        cursor : pointer;
        opacity : 0.8;
      }

      div{
        width : 80%;
        height : 15%;
        background: white;
      }
  }

  .links{
    display : none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height : 75%;
    position : absolute;
    bottom : 0;
    left: 0;
    list-style-type: none;
    width: 100%;
    padding: 0;
    pointer-events: none;

    li{
      font-size: 3rem;
      text-decoration: none;
      border : none;
      padding: 10px 15px;
      color : white;

      &:hover{
        background-color: #e6a800;
        cursor : pointer;
      }

      a{
        color : white;
      }
    }
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
    
  #navDesktop{
    display : none;
  }

  #navMobile{
    display : block;
  }
}
</style>
