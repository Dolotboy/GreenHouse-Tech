<template>
  <form>
    <div class="container">
      <label for="uname"><b>Adresse Courriel : </b></label>
      <input type="text" placeholder="Entrez votre email" name="uname" required>
      <label for="psw"><b>Mot de passe : </b></label>
      <input type="password" placeholder="Entrez le mot de passe" name="psw" required>
      <button type="submit">Se connecter</button>
      <label>
        <input type="checkbox" name="remember"> Se rappeler de moi
      </label>
    </div>
    <div class="container">
      <span class="psw"><a href="#">Mot de passe oublié?</a></span>
    </div>
  </form>
</template>

<script>
export default {

}
</script>

<style>

</style>