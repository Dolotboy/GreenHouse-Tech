<template>
  

  <div class="register">
 <!--   <div class="registerImage">
           <img class="imageIcon" src="https://www.wingsforkids.org/wp-content/uploads/cropped-placeholder.jpg">
    </div> -->
    
    <h1>{{ $t("message.signUp") }}</h1>
    <div class="problem"></div>
    <div class="form">
    <form @submit.prevent="login">
      <div class="lblInp-div" id="firstName">
        <label for="firstName">{{ $t("message.firstName") }}</label>
        <input name="firstName" v-model="firstName"  v-bind:placeholder="$t('message.firstName')" required>
      </div>
      <div class="lblInp-div" id="lastName">
        <label for="lastName">{{ $t("message.lastName") }}</label>
        <input name="lastName" v-model="lastName"  v-bind:placeholder="$t('message.lastName')" required>
      </div>
      <div class="lblInp-div" id="email">
        <label for="email">{{ $t("message.mail") }}</label>
        <input name="email" v-model="email"  v-bind:placeholder="$t('message.mail')" type="email" required>
      </div>
      <div class="lblInp-div " id="password">
        <label for="password">{{ $t("message.password") }}</label>
        <input  class="passDiv" name="password" v-model="password" v-bind:placeholder="$t('message.password')" type="password" required>
      </div>
      <div class="lblInp-div" id="confirmPassword">
        <label for="confirmPassword">{{ $t("message.passwordConfirm") }}</label>
        <input  class="passDiv" name="confpassword" v-model="confirmPassword" v-bind:placeholder="$t('message.passwordConfirm')" type="password" required>
      </div>
      <button type="submit" class="BtnIncription" @click="postCreateUser()">{{ $t("message.signUp") }}</button>      
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

<style lang="scss">
.register{
    position : absolute;
    caret-color: transparent;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 70vw;
    padding : 7.5% 7.5%;

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
    position : absolute;
    height: 100%;
    overflow-y: auto;
    width : 100%;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
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
    font-size: 3rem;

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
        margin: 0 0 0 30px;
  }
      
      }
      input[type-submit]{
        height: 100px;
  }
}
.BtnIncription{
      margin-top:5px;
      width: 70vw;
      height:15%;
      font-size: 15px;
      border-radius: 30px;
      background-color: rgb(18, 15, 194);
      
    }
}

</style>