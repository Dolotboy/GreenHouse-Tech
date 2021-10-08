<template>
    <div class="login">
        <h1>Se connecter</h1>
        <div class="loginForm">
          <form>
            <div class="lblInp-div">
              <label for="uname"><b>Adresse Courriel</b></label>
              <input type="text" placeholder="Entrez votre email" name="uname" required>
            </div>
            <div class="lblInp-div">
              <label for="psw"><b>Mot de passe</b></label>
              <input type="password" placeholder="Entrez le mot de passe" name="psw" required>
            </div>
            <button type="submit">Se connecter</button>
          </form>
            <!--<label>
              <input type="checkbox" name="remember"> Se rappeler de moi
            </label>-->
          <div class="container">
            <span class="psw"><a href="#">Mot de passe oublié?</a></span>
          </div>
        </div>
        <div class="close-button" @click="$emit('close')" >X</div>        
    </div>
</template>

<script>
export default {
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