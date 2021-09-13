<template>
  <ul>
    <li><router-link to="/">Acceuil</router-link></li> 
    <li><router-link to="/about">À propos</router-link></li>
    <li style="float:left"><router-link to="/login">Se connecter</router-link></li>
  </ul>
  <router-view/>
</template>

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

</style>
