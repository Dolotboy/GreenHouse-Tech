<template>
  <div>
    <nav id="navDesktop">
      <div class="logo">
        <img src="./assets/LogoV2.png" alt="Logo">
      </div>
      <ul>
          <li><router-link to="/">Accueil</router-link></li> 
          <li><a href="http://apipcst.xyz" target="_blank">API Interface</a></li>
          <li v-if="!isLoggedIn" @click="toggleRegister">S'inscrire</li>
          <li v-if="!isLoggedIn" @click="toggleLogin">Se connecter</li>   
          <li v-if="isLoggedIn">Bonjour, {{ profile.firstName }} !</li>       
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
          <li @click="toggleNavMobile"><img  src=".\assets\outline_home_white_24dp.png"><p><router-link style="text-decoration: none; color: inherit;"  to="/">Accueil</router-link></p></li> 
          <li @click="toggleNavMobile"><img  src=".\assets\outline_info_white_24dp.png"><p><router-link style="text-decoration: none; color: inherit;" to="/about">À propos</router-link></p></li>
          <li v-if="!isLoggedIn" @click="toggleRegister"><img  src=".\assets\outline_save_alt_white_24dp.png"><p>inscrire</p></li>
          <li v-if="!isLoggedIn" @click="toggleLogin"><img src=".\assets\outline_login_white_24dp.png"><p>connecter</p></li> 
          <li v-if="isLoggedIn">Profile number{{ profile.idProfile }}</li> 
          <li v-if="isLoggedIn" @click="Logout" id="logout"><img src=".\assets\outline_logout_white_24dp.png"><p>déconnection</p></li> 
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
          env : "http://localhost:8000/",
          envBack : "http://testenv.apipcst.xyz/",
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
      this.Initialisation();
  },
  methods :{
    toggleRegister(){
      this.showRegister = !this.showRegister;   
    },
    toggleLogin(){
      this.showLogin = !this.showLogin;
    },
    toggleNavMobile(){
      let links = document.querySelector(".links");
      let navMobile = document.querySelector("#navMobile");
      let hamburger = document.querySelector(".hamburger-wrapper");
      if(!this.mobileNavIsOpened){
      links.style.display = "flex";
      navMobile.style.height = "100vh"; 
      navMobile.style.width="40vw";
      }
      else{
        links.style.display = "none";
        navMobile.style.height = "7.5vh";
        navMobile.style.width="0vw"
      }
      this.mobileNavIsOpened = !this.mobileNavIsOpened;
    },
    async checkToken(){
      if(localStorage.getItem('loggedInToken') != null && localStorage.getItem('loggedInToken') != "")
        this.login(localStorage.getItem('loggedInToken'));
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
      await this.checkToken();
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
    async login(profileToken){
      this.downloadFavorites(profileToken);
      this.isLoggedIn = true;
      this.showLogin = false;
      this.plants = this.plants;
    },
    async logout(){
      localStorage.setItem('loggedInToken', "");
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
  font-family: 'Roboto', sans-serif;
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
  top : 0;
  position : fixed;
  padding : 0 20%;
  caret-color: transparent;
  display : flex;
  justify-content: space-between;
  width : 100vw;
  align-items: center;
  text-transform: uppercase;
  font-size: 1.2rem;    
  .logo{
    width: 60px;
    height: 60px;
    img{
      max-height: 100%;
      max-width: 100%;
    }
  } 
  
ul {
  list-style-type: none;
  overflow: hidden;
  background-color: transparent;
  display: flex;
  justify-content: start;
  color: white;
  text-decoration: none;  
}
li {
  opacity: 0.7;
  a{
    text-decoration: none;  
    color : #fff;  
  }
  &:hover{
    color: #fff;
    cursor: pointer;
    opacity: 1;
  }
}  
ul li {
  display: block;
  color: #fff;
  text-decoration: none;
  text-align: center;
  padding: 10px 15px;
}
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
  position : fixed;
  top : 0;
  left : 0;
  background: rgb(68, 68, 68);
  color : rgb(255, 255, 255);
  height : 7.5vh;
  caret-color: transparent;
  z-index:50;

  .top-wrapper{
    position : relative;
    top : 0;
    left : 0;
    height : 7.5vh;
    background-color: rgb(0, 78, 42);
    z-index:60;
    display: flex;
  }
  .hamburger-wrapper{
      position : absolute;
      top : 50%;
      min-width: 45px;
      min-height: 45px;
      left : 0;
      display : flex;
      flex:1;
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
        height : 13%;
        background: white;
      }
  }
 .profilNum
 {
   flex:1;
  p{
    display:none;
  }
 }
  .links{
    display : none;
    flex-direction: column;
    height: 90vh;
    position : relative;
    bottom : 0;
    left: 0;
    list-style-type: none;
    width: 100%;
    padding: 0;
    #logout{
         position: fixed;
         width: 40vw;
         bottom: 0;
        }
    li{
      display:flex;
      align-items:center;
      font-size: 2.5rem;
      text-decoration: none;
      margin: 1%;
      padding: 10px 5px;
      width: 99%;
      height: 7vh;    
      text-align: center;
       img
       {
         flex:1;
         max-height: 24px;
          max-width: 24px;
       }
       p{
         flex:1;
       }
      &:hover{
        background-color: gray;
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
@media screen and (min-width : 601px) {
  .hamburger-wrapper{
    display: none;
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
