<template>
  

  <div class="register">
 <!--   <div class="registerImage">
           <img class="imageIcon" src="https://www.wingsforkids.org/wp-content/uploads/cropped-placeholder.jpg">
    </div> -->
    
    <h1>S'inscrire</h1>
    <div class="problem"></div>
    <div class="form">
    <form @submit.prevent="login">
      <div class="lblInp-div" id="firstName">
        <label for="firstName">Prénom</label>
        <input name="firstName" v-model="firstName" placeholder="Prénom" required>
      </div>
      <div class="lblInp-div" id="lastName">
        <label for="lastName">Nom de famille</label>
        <input name="lastName" v-model="lastName" placeholder="Nom de famille" required>
      </div>
      <div class="lblInp-div" id="email">
        <label for="email">Adresse courriel</label>
        <input name="email" v-model="email" placeholder="Adresse Courriel" type="email" required>
      </div>
      <div class="lblInp-div " id="password">
        <label for="password">Mot de passe</label>
        <input  class="passDiv" name="password" v-model="password" placeholder="Mot de passe" type="password" required>
      </div>
      <div class="lblInp-div" id="confirmPassword">
        <label for="confirmPassword">Confirmer le mot de passe</label>
        <input  class="passDiv" name="confpassword" v-model="confirmPassword" placeholder="Mot de passe" type="password" required>
      </div>
      <button type="submit" class="BtnIncription" @click="postCreateUser()">S'inscrire</button>      
    </form>
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

<style scoped lang="scss">
.register{
    position : fixed;
    caret-color: transparent;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 70vw;
    padding : 7.5% 7.5%;
    z-index:50;

    h1{
      font-size: 4rem;
  }
}
.passDiv
{

}
.problem{
  color: red;
  height: 5%;
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
.form{
    font-size: 2rem;
    margin: 10% 0;

    form{
      input {
        height: 100%;
        margin: 0 0 0 30px;
      }

      input[type-submit]{
        height: 100px;
      }
    }
}
    @media screen and (max-width : 600px) 
{
  .register{
    position : fixed;
    height: 100%;
    overflow-y: auto;
    width : 100%;
    color:white;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
     background: rgb(53, 54, 53);
    border: solid;
    border-color: black;
    padding : 5% 5%;
    h1{
      margin-top:20%;
      font-size: 4rem;
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

     
.form{
  display: flex;
  justify-content: center;

    font-size: 2rem;
    margin: 5% 0;
    form{
      input {
        height: 100%;
        height:32px;
        margin: 0 0 0 30px;
  }
      
      }
      input[type-submit]{
        height: 100px;
  }
}
.BtnIncription{
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