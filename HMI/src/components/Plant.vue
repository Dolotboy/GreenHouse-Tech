<template>
<div class="wrapper">
  <div class="image">
  <img class="imageIcon" src="https://www.wingsforkids.org/wp-content/uploads/cropped-placeholder.jpg">
  </div>
  <div class="nom">
  <h1>{{ plant.plantName }}</h1>
  <p>{{ plant.idPlant }}</p>
  </div>
  <div class="end">
  <p v-if="isFavorite">Favoris</p>
  <input class="star" type="checkbox" title="Favoris" @click="postAddFavourite()"> 
  </div>
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
@media screen and (max-width : 600px) {
  html{
    font-size : 5pt;
    
  }
  .wrapper{
    position: relative;
    border : solid 1px black;
    border-radius: 40px;
    margin-bottom: 20px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    
}
.image{
  width: 20%;
  background-color: firebrick;
  height: 60%;
  margin-left: 5%;

}
.imageIcon{
  width: 100%;
  height:100%;
}
.nom h1{
  max-width: 100%;
  text-align: center;
}
.nom{
 width: 40%;
 
}
.end{
  width: 20%;
  height:5%
}
}
.image{
  width: 20%;
  background-color: firebrick;
  height: 60%;
  margin-left: 5%;

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