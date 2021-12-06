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
          <input class="inputBox" v-model="password" type="password" placeholder="Entrez votre mot de passe" name="password" required/>
          <input class="inputBox" v-model="password" type="password" placeholder="Confirmez votre mot de passe" name="password" required/>
          <button type="submit" class="btn from-left" @click="postCreateUser()">S'inscrire</button>    
        </div>
      </form>
    </div>
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
      if(this.password == this.confirmPassword)
      {
        let user = this.createUser();
        console.log(JSON.stringify(user));
        //$.post("https://apitestenv.pcst.xyz/api/new/profile/addProfile", JSON.stringify(user));
        $.ajax({
          url : 'http://testenv.apipcst.xyz/api/new/profile/addProfile',
          datatype: 'json',
          contentType : 'application/json',
          type: 'post',
          data: JSON.stringify(user),
          success: function(status)
          {
            alert(status); 
          }
        });
      }
      else
      {
        var element = document.querySelector(".passDiv");
        var text= document.querySelector(".problem");
        text.innerHTML="les mot de passe ne correspondent pas";
        element.style.border="solid red"; 
      }
      }
    }
}
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap");

body {
	--def: #fff; 	
	--inv: #fff;
}

.register {
  width: 45vw;
  height: 91vh;
  background-color: rgba(0, 0, 0, 0.7);
  color: #fff;
  display : flex;
  flex-direction: column;
  align-items: center;

  h1 {
    font-family: "Roboto", sans-serif;
    font-weight: 900;
  }

  .logo {
    margin: 10px 0 25px 0;
  }
}
.Name{
  display: flex;
  margin: 0;
}
@media screen and (max-width: 1100px){
  .Name{
    display: inline;
  }
  .formLogin{
    padding: 0 20px 0 20px;
  }
}
.formLogin {
  width: 110%;

  .inputBox {
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
</style>