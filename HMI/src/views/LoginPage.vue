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
          <button type="submit" class="btn from-left" @click="postCheckLogin()">Se connecter</button>
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
        url: toolbox.env + "login/checkLogin/",
        datatype: "json",
        contentType: "application/json",
        type: "post",
        data: JSON.stringify(user),
        success: function (status) {
          localStorage.setItem("loggedInToken", status.id);
          that.$emit("loggedIn", status.id);
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
</style>