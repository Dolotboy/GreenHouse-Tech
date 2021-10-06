<template>
  <div class="register">
    <h1>S'inscrire</h1>
    <div class="form">
    <form @submit.prevent="login">
      <div id="firstName">
        <label for="firstName">Prénom</label>
        <input name="firstName" v-model="firstName" placeholder="Prénom" required>
      </div>
      <div id="lastName">
        <label for="lastName">Nom de famille</label>
        <input name="lastName" v-model="lastName" placeholder="Nom de famille" required>
      </div>
      <div id="email">
        <label for="email">Adresse courriel</label>
        <input name="email" v-model="email" placeholder="Adresse Courriel" type="email" required>
      </div>
      <div id="password">
        <label for="password">Mot de passe</label>
        <input name="password" v-model="password" placeholder="Mot de passe" type="password" required>
      </div>      
    </form>
    <input type="submit" @click="postCreateUser()" value="S'inscrire">
    </div>    
    <div class="close-button" @click="$emit('close')" >X</div> 
  </div>
</template>

<script>
import $ from '../../node_modules/jquery/dist/jquery.js'

export default {
    name: "App",
    data() {
        return {
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        access: "user"
        };
    },
    methods : {
      createUser(){
        var user = {
          firstName : this.firstName,
          lastName : this.lastName,
          email : this.email,
          password : this.password,
          access : this.access
        }
        return user;
      },
      postCreateUser(){
        let user = this.createUser();
        console.log(JSON.stringify(user));
        //$.post("https://apitestenv.pcst.xyz/api/new/profile/addProfile", JSON.stringify(user));
        $.ajax({
          url : 'http://apitestenv.pcst.xyz/api/new/profile/addProfile',
          datatype: 'json',
          contentType : 'application/json',
          type: 'post',
          data: JSON.stringify(user),
          success: function()
          {
            alert("Inscription effectuée!"); 
          }
        });
      }
    }
}
</script>

<style>
.register{
    position : absolute;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 50vw;
    height: 65vh;
    padding-left: 5%;
    padding-right: 5%;
}
.close-button {
    position: absolute;
    top: 1%;
    right: 1%;
    font-size: 3rem;
}
.close-button:hover{
    cursor: pointer;
    border:solid;
    border-width: 1px;
    border-color: grey;
}
.register h1{
    font-size: 5rem;
}
.form{
    font-size: 2rem;
    margin: 10% 0;
}
.form > form > div{
    margin: 20px 0;
}
form >form > input {
    height: 100%;
    margin: 0 0 0 30px;
}
div > input[type-submit]{
    height: 100px;
}
</style>