<template>
    <div class="login">
        <h1>Se connecter</h1>
        <div class="detailsPlant">
          <form>
          <label for="uname"><b>Adresse Courriel : </b></label>
            <input type="text" placeholder="Entrez votre email" name="uname" required>
            <label for="psw"><b>Mot de passe : </b></label>
            <input type="password" placeholder="Entrez le mot de passe" name="psw" required>
          </form>
            <button type="submit">Se connecter</button>
            <label>
              <input type="checkbox" name="remember"> Se rappeler de moi
            </label>
          </div>
          <div class="container">
            <span class="psw"><a href="#">Mot de passe oublié?</a></span>
          </div>
        <div class="close-button" @click="$emit('close')" >X</div>        
    </div>
</template>

<script>
export default {
}
</script>

<style>
.login{
    position : absolute;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 50vw;
    height: 75vh;
    padding-left: 5%;
    padding-right: 5%;
}
.close-button {
    position: absolute;
    top: 1%;
    right: 1%;
    font-size: 30pt;
}
.close-button:hover{
    cursor: pointer;
    border:solid;
    border-width: 1px;
    border-color: grey;
}
.login h1{
    font-size: 35px;
}
.login > p{
    font-size: 24px;
    margin-top: 1.5%;
    text-align: left;
}
</style>