<template>
    <div class="login">
        <h1>Se connecter</h1>
        <div class="loginForm">
          <form>

          <label for="uname"><b>Adresse Courriel : </b></label>
            <input type="text" placeholder="Entrez votre email" name="uname" required  v-model="email">
            <label for="psw"><b>Mot de passe : </b></label>
            <input v-model="password" type="password" placeholder="Entrez le mot de passe" name="psw" required>
          </form>
            <button type="submit" @click="postCheckLogin()">Se connecter</button>
            <label>
              <input type="checkbox" name="remember"> Se rappeler de moi
          </label>
          <div class="container">
            <span class="psw"><a href="#">Mot de passe oublié?</a></span>
          </div>
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
        email: "",
        password: "",
        };
    },
    methods : {
      createUser(){
        var userCredentials = {
          email : this.email,
          password : this.password,
        }
        return userCredentials;
      },
      postCheckLogin(){
        let user = this.createUser();
        let that = this;

        $.ajax({
          url : 'http://testenv.apipcst.xyz/api/login/checkLogin/',
          datatype: 'json',
          contentType : 'application/json',
          type: 'post',
          data: JSON.stringify(user),
          success: function(status)
          {
            that.$emit("loggedIn", status); 
          }
        });
      }
    }
}
</script>

<style lang="scss">
.login{
    position : absolute;
    display : flex;
    flex-direction : column;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 50vw;
    max-width : 50vw;
    padding : 7.5%;

    h1{
      font-size: 4rem;
      margin-top : 0;
    }

    .close-button {
      position: absolute;
      top: 1%;
      right: 1%;
      font-size: 3rem;

      &:hover{
        cursor: pointer;
        border:solid;
        border-width: 1px;
        border-color: grey;
      } 
    }
    .loginForm{
      font-size: 1.6rem;
    }
}

@media screen and (max-width : 1000px) {
  body{
    font-size : 6pt;
  }
}
</style>