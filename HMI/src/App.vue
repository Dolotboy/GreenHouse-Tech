<template>
  <div>
    <nav id="navDesktop">
      <div class="logo">
        <router-link to="/"><img src="./assets/LogoV2.png" alt="Logo"></router-link>
      </div>
      <ul>
          <li><router-link to="/">{{ $t("message.accueil") }}</router-link></li> 
          <li><a href="http://apipcst.xyz/fr" target="_blank">{{ $t("message.APIInterface") }}</a></li>
          <li v-if="!isLoggedIn" @click="toggleRegister"><router-link to="/register">{{ $t("message.signUp") }}</router-link></li>
          <li v-if="!isLoggedIn" @click="toggleLogin"><router-link to="/login">{{ $t("message.signIn") }}</router-link></li>   
          <li v-if="isLoggedIn">{{ $t("message.hi") }}{{ profile.firstName }} !</li>
          <li v-if="isLoggedIn" @click="logout()">{{ $t("message.disconnect") }}</li> 
      </ul>
    </nav>
    <nav id="navMobile" style="transition: width 0.1s ease-in;">
      <div class="top-wrapper">
        <div @click="toggleNavMobile" class="hamburger-wrapper">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
     <ul class="links">
          <li v-if="isLoggedIn">{{ $t("message.profileNumber") }} :{{ profile.idProfile }}</li> 
          <li @click="toggleNavMobile"><a  href="/"><img  src=".\assets\outline_home_white_24dp.png"><p>{{ $t("message.accueil") }}</p></a></li> 
          <li @click="toggleNavMobile"><a href="http://apipcst.xyz/fr"><img  src=".\assets\outline_info_white_24dp.png"><p>{{ $t("message.apropos") }}</p></a></li>
          <li v-if="!isLoggedIn" @click="toggleRegister"><router-link to="/register"><img  src=".\assets\outline_save_alt_white_24dp.png"><p>{{ $t("message.signUp") }}</p></router-link></li>
          <li v-if="!isLoggedIn" @click="toggleLogin"><router-link to="/login"><img src=".\assets\outline_login_white_24dp.png"><p>{{ $t("message.signIn") }}</p></router-link></li> 
          <li><a id="BtnFr"><img src=".\assets\outline_language_white_24dp.png"><p>Francais</p></a></li>
          <li><a id="BtnEn"><img src=".\assets\outline_language_white_24dp.png"><p>English</p></a></li>
          <li v-if="isLoggedIn" @click="Logout" id="logout"><img src=".\assets\outline_logout_white_24dp.png"><p>{{ $t("message.disconnect") }}</p></li> 
      </ul>
    </nav>
    <router-view @loggedIn="Initialisation()"/>
    <!--<Login @loggedIn="login" v-if="showLogin" @close="toggleLogin"/>
    <Register v-if="showRegister" @close="toggleRegister"/>-->
    <Loading v-if="showLoading"/>  
  </div>
</template>

<script>
import toolbox from './toolbox.js';
import Loading from './components/Loading.vue';
import FavCondition from './components/FavCondition.vue';
import $ from '../node_modules/jquery/dist/jquery.js';
export default {
  components :{
    FavCondition,
    Loading
  },
  data(){
      return{
          //env : "http://localhost:8000/",
          //envBack : "http://testenv.apipcst.xyz/",
          plants : [],
          favorites : [],
          showLoading : false,
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
    toggleNavMobile(){
      let links = document.querySelector(".links");
      let navMobile = document.querySelector("#navMobile");
      let hamburger = document.querySelector(".hamburger-wrapper");
      if(!this.mobileNavIsOpened){
      links.style.display = "flex";
      navMobile.style.transition=" width 0.15s ease-in";
      navMobile.style.height = "100vh"; 
      navMobile.style.width="40vw";
      }
      else{
        links.style.display = "none";
        navMobile.style.transition="none";
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
      this.showLoading = true;
      let version = localStorage.getItem('apiVersion');
      let apiVersion = await this.GetApiVersion(toolbox.env + "search/last/version");
      if(version == undefined || version != apiVersion){
        await this.ClearDb();
        localStorage.setItem('apiVersion', apiVersion);
        await this.DownloadContent();
      }     
      this.plants = await toolbox.fetchData(await toolbox.setDb());
      if(this.plants.length == 0)
        await this.DownloadContent();   
      await this.checkToken();
      this.showLoading = false;
      console.log(this.isLoggedIn);
    },
    async ClearDb(){
      let db = await toolbox.setDb();
      toolbox.ClearDb(db);
    },
    async DownloadContent(){
      this.plants = await this.GetAllPlants(toolbox.env + "searchAll/package");
      let db = await toolbox.setDb();
      let transaction = db.transaction(["GreenHouseTech_Entrepot2"], "readwrite");
      let entrepot = transaction.objectStore("GreenHouseTech_Entrepot2");;
      for(let i = 0; i < this.plants.length; i++){   
        entrepot.add(toolbox.GenerateObject(this.plants[i]));
      }
      location.reload();
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
      this.profile = await this.getObject(toolbox.getApiUrl() + "search/profile/token/" + profileToken);
      console.log(this.profile);
      this.downloadFavorites(profileToken);
      this.isLoggedIn = true;
      this.plants = this.plants;
    },
    async logout(){
      localStorage.setItem('loggedInToken', "");
      this.profile = null;
      this.isLoggedIn = false; 
      this.favorites = [];
      localStorage.setItem('favorites', "[]");
      this.plants = this.plants;
      console.log(this.isLoggedIn);
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
    async downloadFavorites(profileToken){
      this.favorites = await this.getFavorites(toolbox.getApiUrl() + "searchAll/favorite/token/" + profileToken);
      console.log("Favorites" + this.favorites);
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
  z-index: 1000; 
  background-color: rgba(0,0,0,0.9);
  height: 9vh;

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
  z-index:120;
  .top-wrapper{
    position : relative;
    top : 0;
    left : 0;
    height : 7.5vh;
    background-color: rgb(0, 78, 42);
    z-index:50;
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
    overflow-y: auto;
    display : none;
    flex-direction: column;
    height: 90vh;
    gap:1%;
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
     min-height: 50px;
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
       a{
      display:flex;
      align-items:center;
      font-size: 2.5rem;
      text-decoration: none;
      margin: 1%;
      width :100%;
      height: 7vh;    
      text-align: center;
      
        
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
