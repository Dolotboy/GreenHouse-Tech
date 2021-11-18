<template>
<div class="wrapper">
  <div class="image">
    <img class="imageIcon" :src="plant.plantImg" alt="Image vegetable">
  </div>
  <div class="nom">
  <h1>{{ plant.plantName }}</h1>
  <p>{{ plant.idPlant }}</p>

  <!-- <input class="star" type="checkbox" title="Favoris" :checked="isFavorite" @click="toggleFavorite">  -->

  </div>
  <div class="end">
  <p v-if="isFavorite">Favoris</p>
  <input class="star" type="checkbox" title="Favoris" :checked="isFavorite" @click="toggleFavorite()"> 
  </div>
</div>
</template>

<script>
import $ from '../../node_modules/jquery/dist/jquery.js'
export default {
    props : ['plant', 'idProfile', 'isFavorite'],
    methods : {
      addFavorite(){
        let that = this;

        let url = "http://localhost:8000/api/new/favorite/token/";
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

        let url = "http://localhost:8000/api/delete/favorite/token";
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
@media screen and (max-width : 600px) {
  html{
    font-size : 5pt;
    
  }
  .wrapper{
    position: relative;
    border : solid 1px black;
    border-radius: 40px;
    margin-bottom: 20px;
    max-width: 95%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    
}
.image{
  width: 20%;
  height: 60%;
  position : absolute;
  top : 50%;
  left : 5%;
  transform: translateY(-50%);
}
.imageIcon{
  max-width: 100%;
  max-height:100%;
}
.nom h1{
  max-width: 100%;
  text-align: center;
}
.nom{
 width:50%;
 
}
.end{
  width: 20%;
  height:5%
}
}
.image{
  width: 20%;
  height: 60%;
  position : absolute;
  top : 50%;
  left : 5%;
  transform : translateY(-50%);
}
.imageIcon{
  width: 100%;
  height:100%;
}
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