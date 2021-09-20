<template>
  <div>
    <nav>
      <ul>
        <div id="BasicNav">
          <li><router-link to="/">Acceuil</router-link></li> 
          <li><router-link to="/about">À propos</router-link></li>
        </div>
        <div id="Login">
          <li>Se connecter</li>
        </div>
      </ul>
    </nav>
    <Popuplogin></Popuplogin>  
    <router-view/>
    <button v-if="!loginShow" @click="toggleLogin">Se Connecter</button>
  </div>
</template>

<script>
import PopupLogin from './components/PopupLogin.vue'

export default {
  name  : 'App' ,
  components : {
    PopupLogin
  },
  data(){
    return {
      loginShow : false
    } 
  },
  methods: {
    toggleLogin(){
      this.loginShow = !this.loginShow;
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
  background-color: #4E5754 ;
  display: flex;
  justify-content: center;
  
}

#Login {
  position: absolute;
  right: 0%;
  top: 0%;
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

</style>
