<template>
  <div class="register">
    <h1>S'inscrire</h1>
    <div class="logo">
      <img src="../assets/LogoV2.png" alt="Logo" />
    </div>
    <div class="formLogin">
      <form>
        <div>
          <div class="Name">
            <input class="inputBox" name="firstName" v-model="firstName" placeholder="Prénom" required>
            <input class="inputBox" name="lastName" v-model="lastName" placeholder="Nom" required>
          </div>  
          <input class="inputBox" type="email" placeholder="Entrez votre adresse email" name="uname" required v-model="email"/>
          <input class="passDiv" v-model="password" type="password" placeholder="Entrez votre mot de passe" name="password" required/>
          <input class="passDiv" v-model="confirmPassword" type="password" placeholder="Confirmez votre mot de passe" name="confPassword" required/>
          <button type="button" class="btn from-left" @click="postCreateUser()">S'inscrire</button>    
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import $ from '../../node_modules/jquery/dist/jquery.js'
import toolbox from "../toolbox.js";

export default {
    name: "App",
    data() {
        return {
        firstName: "",
        lastName: "",
        email: "",
        password: "",
        confirmPassword : "",
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
      if(this.password == this.confirmPassword)
      {
        let user = this.createUser();
        let that = this;
        //$.post("https://apitestenv.pcst.xyz/api/new/profile/addProfile", JSON.stringify(user));
        $.ajax({
          type: "post",
          url : toolbox.getApiUrl() + "new/profile/addProfile",
          datatype: "json",
          contentType : "application/json",
          data: JSON.stringify(user),
          success: function(status)
          {
            alert("Inscription réussie"); 
            that.$router.push('/login');
          }
        });
      }
      else
      {
        console.log("failed to create");
        var element = document.querySelector(".passDiv");
        var text= document.querySelector(".problem");
        text.innerHTML="les mot de passe ne correspondent pas";
        element.style.border="solid red"; 
      }
      }
    }
}
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap");

body {
	--def: #fff; 	
	--inv: #fff;
}
@media screen and (min-width : 601px) 
{
.register {
  position: absolute;
  width: 45vw;
  height: 85vh;
  transform: translate(55%,12%);
  background-color: rgba(0, 0, 0, 0.7);
  color: #fff;
  display : flex;
  flex-direction: column;
  align-items: center;

  h1 {
    font-family: "Roboto", sans-serif;
    font-weight: 900;
    font-size: 3rem;
  }

  .logo {
    margin: 10px 0 25px 0;
  }
}
.Name{
  display: flex;
  margin: 0;
}
.formLogin {
  width: 40vw;

  .inputBox {
    width: 100%;
    border-radius: 5px;
    margin: 0 0 5vh 0;
    text-align: left;
    font-size: 20pt;
  }
  .passDiv
{
width: 100%;
    border-radius: 5px;
    margin: 0 0 5vh 0;
    text-align: left;
    font-size: 20pt;
}
}
.btn {		
	position: relative;	
	padding: 1.4rem 4.2rem;
	padding-right: 3.1rem;
	font-size: 1.4rem;
	color: var(--inv);
	letter-spacing: 1.1rem;
	text-transform: uppercase;
	transition: all 500ms cubic-bezier(0.77, 0, 0.175, 1);	
	cursor: pointer;
	user-select: none;
}

.btn:before, .btn:after {
	content: '';
	position: absolute;	
	transition: inherit;
	z-index: -1;
}

.btn:hover {
	color: var(--def);
	transition-delay: .5s;
  
}

.btn:hover:before {
	transition-delay: 0s;
}

.btn:hover:after {
	background: var(--inv);
	transition-delay: .35s;
  background: green;
}
.from-left:before, 
.from-left:after {
	top: 0;
	width: 0;
	height: 100%;
}

.from-left:before {
	right: 0;
	border: 1px solid var(--inv);
	border-left: 0;
	border-right: 0;	
}

.from-left:after {
	left: 0;
}

.from-left:hover:before,
.from-left:hover:after {
	width: 100%;
}
*, *:before, *:after {
	box-sizing: border-box;
}

div {margin-bottom: 3rem;}
div:last-child {margin-bottom: 0;}
}
@media screen and (max-width : 600px)
{
  .register{
    position : fixed;
    height: 100%;
    overflow-y: auto;
    width : 100%;
    color:white;
    flex-direction: column;
    align-items: center;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
     background: rgb(53, 54, 53);
    border: solid;
    border-color: black;
    padding : 5% 5%;
    h1{
      margin-top:5%;
      font-size: 4rem;
  }
  
}

.Name{

display: flex;
  margin: 0;
  
}

 .logo
    {
      display: flex;
      justify-content: center;
      width: 100%;
      height: 30%;
      img{
        width: 100%;
        height:100%;
        min-height: 100px;
      min-width:100px;
      max-width: 150px;
      max-height: 150px;
    }
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
     
.formLogin {
  width: 85vw;
  flex-direction: column;
  justify-content: center;

  .inputBox {
    width: 100%;
    border-radius: 5px;
    margin: 0 0 5vh 0;
    text-align: left;
    font-size: 20pt;
  }
  .passDiv
{
width: 100%;
    border-radius: 5px;
    margin: 0 0 5vh 0;
    text-align: left;
    font-size: 20pt;
}
}
.btn{
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
        transform: translateY(-7px);
      }
    }
}
</style>