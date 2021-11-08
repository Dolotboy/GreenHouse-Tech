<template>
<div class="wrapper">
  <h1>{{ plant.plantName }}</h1>
  <p v-if="isFavorite">Favoris</p>
  <p>{{ plant.idPlant }}</p>
  <input class="star" type="checkbox" title="Favoris" :checked="isFavorite" @click="toggleFavorite"> 
</div>
</template>

<script>
import $ from '../../node_modules/jquery/dist/jquery.js'
export default {
    props : ['plant', 'idProfile', 'isFavorite'],
    methods : {
      addFavorite(){
        let that = this;

        let url = "http://testenv.apipcst.xyz/api/new/favorite/";
        let type = "post";

        return new Promise(resolve => {
          $.ajax({
            url : url + this.plant.idPlant + '/'+ this.getLoggedInProfile(),
            datatype: 'json',
            contentType : 'application/json',
            type: type,
            data: "{}",
            success: function(status)
            {
              let favorites = JSON.parse(localStorage.getItem('favorites'));
              if(favorites == null || favorites == undefined)
                favorites = [];

              let fav = {"tblPlant_idPlant":that.plant.idPlant,"tblProfile_idProfile":that.getLoggedInProfile()};
              favorites.pop
              favorites.push(fav);
              localStorage.setItem('favorites', JSON.stringify(favorites)); 
            }
          });
        })
      },
      deleteFavorite(){
        let that = this;

        let url = "http://testenv.apipcst.xyz/api/delete/favorite/";
        let type = "delete";

        return new Promise(resolve => {
          $.ajax({
            url : url + this.plant.idPlant + '/'+ this.getLoggedInProfile(),
            datatype: 'json',
            contentType : 'application/json',
            type: type,
            data: "{}",
            success: function(status)
            {
              let newFavorites = [];
              let favorites = JSON.parse(localStorage.getItem('favorites'));
              if(favorites == null || favorites == undefined)
                favorites = [];

              let fav = {"tblPlant_idPlant":that.plant.idPlant,"tblProfile_idProfile":that.getLoggedInProfile()};
              
              for(let i = 0; i < favorites.length; i++)
                if(favorites[i].tblPlant_idPlant != fav.tblPlant_idPlant && favorites[i].tblProfile_idProfile != fav.tblProfile_idProfile)
                  newFavorites.push(favorites[i]);

              localStorage.setItem('favorites', JSON.stringify(newFavorites)); 
              resolve(newFavorites);
            }
          });
        });
      },
      async toggleFavorite(event){
        this.$emit('favClicked');

        if(this.getLoggedInProfile() == null || this.getLoggedInProfile() == undefined || this.getLoggedInProfile() == "" || this.getLoggedInProfile() == "null"){
          this.$emit("popLogin");
          event.target.checked = false;
          return;
        }
        if(this.isFavorite)
          await this.deleteFavorite();
        else
          await this.addFavorite();
        console.log(JSON.parse(localStorage.getItem('favorites')));
      },
      getLoggedInProfile(){
        return localStorage.getItem('loggedInToken');
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