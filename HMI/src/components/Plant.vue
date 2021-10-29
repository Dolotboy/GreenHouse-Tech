<template>
<div class="wrapper">
  <h1>{{ plant.plantName }}</h1>
  <p v-if="isFavorite">Favoris</p>
  <p>{{ plant.idPlant }}</p>
  <input class="star" type="checkbox" title="Favoris" @click="postAddFavourite()"> 
</div>
</template>

<script>
import $ from '../../node_modules/jquery/dist/jquery.js'
export default {
    props : ['plant', 'idProfile', 'isFavorite'],
    methods : {
      postAddFavourite(){
        let that = this;
        $.ajax({
          url : 'http://testenv.apipcst.xyz/api/new/favorite/'+ this.plant.idPlant + '/'+ this.getLoggedInProfile(),
          datatype: 'json',
          contentType : 'application/json',
          type: 'post',
          data: "{}",
          success: function(status)
          {
            alert("Added successfully");
            let favorites = JSON.parse(localStorage.getItem('favorites'));
            if(favorites == null || favorites == undefined)
              favorites = [];

            let fav = {"tblPlant_idPlant":that.plant.idPlant,"tblProfile_idProfile":that.getLoggedInProfile()};
            favorites.push(fav);
            localStorage.setItem('favorites', JSON.stringify(favorites)); 
          }
        });
      },
      getLoggedInProfile(){
        return localStorage.getItem('loggedInProfileId');
      }
    }
}
</script>

<style>
.wrapper{
    position: relative;
    border : solid 1px black;
}
.star {
    top: 5px;
    right: 50px;
    position: absolute;
    font-size:40px;
    cursor:pointer;
    color: white;
}
.star:before {
   content: "\2606";
   position: absolute;
   visibility:visible;
}
.star:hover{
  color: gold;
  content: "\2605";
}
.star:checked:before {
   content: "\2605";
   position: absolute;
   color: gold;
}
</style>