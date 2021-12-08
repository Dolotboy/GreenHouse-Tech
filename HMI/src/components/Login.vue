<!--<template>
    <div class="login">
        <h1>Connexion</h1>
        <div class="loginForm">
          <form >
          <div>
            <input class="inputBox" type="text" placeholder="Entrez votre email" name="uname" required  v-model="email">
          </div>
          <div>
            <input v-model="password" class="inputBox" type="password" placeholder="Entrez le mot de passe" name="psw" required>
            </div>
          </form>
            <div class="checks">
              <div>
                <label>
                <input type="checkbox" name="remember"> Se rappeler de moi
              </label>
              </div>
          </div>
          <button type="submit" class="BtnConnexion" @click="postCheckLogin()">Se connecter</button>
        </div>      
    </div>
</template>

<script>
import toolbox from '../toolbox.js';
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
          url : toolbox.env + 'login/checkLogin/',
          datatype: 'json',
          contentType : 'application/json',
          type: 'post',
          data: JSON.stringify(user),
          success: function(status)
          {
            localStorage.setItem("loggedInToken", status.id);
            that.$emit("loggedIn", status.id); 
          }
        });
      }
    }
}
</script>-->

<style lang="scss">
/*.login{
    position : absolute;
    display : flex;
    flex-direction : column;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(151, 151, 151);
    border: solid;
    border-color: black;
    width : 100%;
    height:100%;
    max-width : 100%;
    padding : 7.5%;
    align-items: center;

    h1{
      font-size: 4rem;
      margin-top : 3%;
    }
    .loginImage
    {
      width: 90%;
      height: 40%;
      background-color: blue;
      max-width: 350px;
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
      flex-direction: column;
      width: 70vw;
    }
   
    .inputBox
    {
      height:6vh;
      margin-top:3%;
      margin-bottom: 3%;
      width: 85%;   
    }
}
@media screen and (max-width : 600px) 
{
  .login{
    position : absolute;
    display : flex;
    overflow-y: auto;
    flex-direction : column;
    justify-content: center;
    caret-color: transparent;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(151, 151, 151);
    border: solid;
    border-color: black;
    width : 100%;
    height:100%;
    max-width : 100%;
    padding : 7.5%;
    align-items: center;
    h1{
      font-size: 4rem;
      margin-top : 18px;
    }
    .loginImage
    {
      width: 90%;
      height: 40%;
      background-color: blue;
      max-width: 350px;
    }
    .imageIcon{
  width: 100%;
  height:100%;
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
      flex-direction: column;
       width: 70vw;
    }
   
    .inputBox
    {
      height:6vh;
      margin-top:10px;
      margin-bottom: 10px;
      width: 80%;    
    }
    .checks{
      display: flex;
     flex-wrap: wrap;
      height: 35px;
      width: 100%;
      justify-content: space-around;
      align-items: center;
      margin-bottom: 10px;
    }   
    .BtnConnexion{
      margin-top:5px;
      width: 70%;
      height:20%;
      font-size: 15px;
      border-radius: 30px;
      background-color: rgb(18, 15, 194);
      
    }
}
}

@media screen and (max-width : 1000px) {
  body{
    font-size : 6pt;
  }
}*/
</style>