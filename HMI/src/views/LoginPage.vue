<template>
  <div class="login">
    <h1>Se connecter</h1>
    <div class="logo">
      <img src="../assets/LogoV2.png" alt="Logo" />
    </div>
    <div class="formLogin">
      <form>
        <div>
          <input
            class="inputBox"
            type="text"
            placeholder="Entrez votre email"
            name="uname"
            required
            v-model="email"
          />
        </div>
        <div>
           <input type="password" class="inputBox" v-model="password" placeholder="Entrez votre mot de passe">
          <button type="button" class="btn from-left" @click="postCheckLogin()">Se connecter</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import toolbox from "../toolbox.js";
import $ from "../../node_modules/jquery/dist/jquery.js";

export default {
  name: "App",
  data() {
    return {
      email: "",
      password: null,
    };
  },
  computed: {
    buttonLabel() {
      return (this.showPassword) ? "Hide" : "Show";
    }
  },
  methods: {
    toggleShow() {
      this.showPassword = !this.showPassword;
    },
    createUser() {
      var userCredentials = {
        email: this.email,
        password: this.password,
      };
      return userCredentials;
    },
    postCheckLogin() {
      let user = this.createUser();
      let that = this;

      $.ajax({
        type: "post",
        url: toolbox.getApiUrl() + "login/checkLogin",
        datatype: "json",
        contentType: "application/json",
        data: JSON.stringify(user),
        success: function (status) {
          localStorage.setItem("loggedInToken", status.id);
          that.$emit("loggedIn");
          that.$router.push('/');
        },
      });
    },
  },
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap");

body {
	--def: #fff; 	
	--inv: #fff;
}

@media screen and (min-width : 601px) {
.login {
  position: absolute;
  width: 45vw;
  height: auto;
  padding-bottom: 10%;
  transform: translate(55%,12%);
  background-color: rgba(0, 0, 0, 0.7);
  margin: 3vh 0 0 0;
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
    margin: 20px 0 25px 0;
  }
}
.formLogin {
  width: 35vw;

  .inputBox {
    width: 100%;
    border-radius: 15px;
    margin: 10px 0 50px 0;
    text-align: center;
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
@media screen and (max-width : 600px) {
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
 
    .logo
    {
      width: 75%;
      height: 40%;
      min-height: 150px;
      min-width:150px;
      max-width: 200px;
      max-height: 200px;
      img{
        width: 100%;
        height:100%;
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
        transform: translateY(-5px);
      }
      
    }
}


}
</style>