<template>
    <div class="login">
       <h1>Connexion</h1>
        <div class="loginImage">
           <img class="imageIcon" src="../assets/LogoV2.png">
       </div>
        <div class="loginForm">
          <form >
          <div>
         <!-- <label for="uname"><b>Adresse Courriel : </b></label> -->
            <input class="inputBox" type="text" placeholder="Entrez votre email" name="uname" required  v-model="email">
          </div>
          <div>
            <!-- <label for="psw"><b>Mot de passe : </b></label> -->
            <input v-model="password" class="inputBox" type="password" placeholder="Entrez le mot de passe" name="psw" required>
            </div>
          </form>
<!--
            <div class="checks">
              <div>
                <label>
                <input type="checkbox" name="remember"> Se rappeler de moi
              </label>
              </div>
            <div class="container">
              <span class="psw"><a href="#">Mot de passe oublié?</a></span>
            </div>
          </div>
          -->
          <button type="submit" class="BtnConnexion" @click="postCheckLogin()">Se connecter</button>
        </div>
        
        <div class="close-button" @click="$emit('close')" >X</div>        
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
</script>

<style scoped lang="scss">
@media screen and (min-width : 601px) 
{
.login{
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
       width: 70%;
    }
   
    .inputBox
    {
      height:6vh;
      margin-top:3%;
      margin-bottom: 3%;
      width: 70vw;
    }
}
}
@media screen and (max-width : 600px) 
{
  .login{
    -webkit-tap-highlight-color: transparent;
    z-index:100;
    justify-content: space-evenly;
    position : fixed;
    color:white;
    gap:5vh;
    display : flex;
    overflow-y: auto;
    flex-direction : column;
    caret-color: transparent;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(53, 54, 53);
    border: solid;
    border-color: black;
    width : 100%;
    height:100%;
    max-width : 100%;
    padding : 7.5%;
    overflow-y:auto ;
    align-items: center;
    h1{
      font-size: 5rem;
      margin-top : 18px;
      color:white;
    }
    .loginImage
    {
      width: 75%;
      height: 40%;
      min-height: 150px;
      min-width:150px;
      max-width: 200px;
      max-height: 200px;
    }
    .imageIcon{
  width: 100%;
  height:100%;
}
    .close-button {
      position: absolute;
      top: 1%;
      right: 1%;
      font-size: 5rem;

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
      width: 80vw
      
    }
   
    .inputBox
    {
      height:48px;
      margin-top:20px;
      margin-bottom: 12px;
      width: 100%;    
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
      font-family: 'Roboto', sans-serif;
       text-transform: uppercase;
      letter-spacing: 2.5px;
      font-weight: 500;
      border: none;
      border-radius: 45px;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease 0s;
       cursor: pointer;
      outline: none;
      margin-top:32px;
      width: 80vw;
      height:60px;
      font-size: 15px;
      border-radius: 30px;
      background-color: rgb(4, 63, 9);
      &:hover{
        background-color: #2EE59D;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-5px);
      }
      
    }
}
}

@media screen and (max-width : 1000px) {
  body{
    font-size : 6pt;
  }
}
</style>