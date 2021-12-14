<template>
<div class="wrapper">
  <div class="image">
    <img class="imageIcon" :src="plant.plantImg" alt="Image vegetable">
  </div>
    <div class="nom">
    <h1>{{ plant.plantName }}</h1>
  </div>
  <div class="end">
  <input class="star" type="checkbox" :checked="isFavorite" title="Favoris" @click="toggleFavorite"> 
  </div>
</div>
</template>

<script>
import $ from '../../node_modules/jquery/dist/jquery.js'
import toolbox from '../toolbox.js';

export default {
    props : ['plant', 'idProfile', 'isFavoriteProp'],
    data(){
      return{
        isFavorite : Boolean
      }
    },
    mounted(){
      this.isFavorite = this.isFavoriteProp
    },
    methods : {
      addFavorite(){
        let that = this;

        let url = toolbox.getApiUrl() + "new/favorite/token/";
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
              console.log("ajout favorite");
              let favorites = JSON.parse(localStorage.getItem('favorites'));
              if(favorites == null || favorites == undefined)
                favorites = [];

              let fav = {"tblPlant_idPlant":that.plant.idPlant,"tblProfile_idProfile":that.getLoggedInProfile()};
              favorites.push(fav);
              localStorage.setItem('favorites', JSON.stringify(favorites)); 
              //that.setAsFavorite();
            }
          });
        })
      },
      deleteFavorite(){
        console.log("deletefavorite");
        let that = this;

        let url = toolbox.getApiUrl() + "delete/favorite/token/";
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
        console.log("IS FAVORITE" + this.isFavorite);
        this.$emit('favClicked');
        if(this.getLoggedInProfile() == null || this.getLoggedInProfile() == undefined || this.getLoggedInProfile() == "" || this.getLoggedInProfile() == "null"){
          this.$router.push('/login');
          event.target.checked = false;
          return;
        }
        if(this.isFavorite){
          this.isFavorite = false;
          await this.deleteFavorite();
        }
        else{
          this.isFavorite = true;
          await this.addFavorite();
        }
      },
      getLoggedInProfile(){
        return localStorage.getItem('loggedInToken');
      }
    }
}
</script>

<style scoped lang="scss">
@media screen and (max-width : 600px) {
  html{
    font-size : 1.5rem;
    
  }
  .wrapper{
    position: relative;
    border : solid 1px black;
    border-radius: 40px;
    margin-bottom: 10px;
    height: 80px;
    display:flex;
    width: 95%;
    min-width: 380px;
    height: 12vh;
    display:flex;
    width: 90vw;
    flex-direction: row;
    align-items: center;
    justify-content: space-evenly; 
}
.image{
  width: 20vw;
  height: 60vh;
}
.imageIcon{
  max-width: 100%;
  max-height:100%;
 
}
.nom h1{
  max-width: 100%;
  font-size: 2rem;
  text-align: center;
}
.nom{
  display:block;
 width:50%;
 
}
.end{
  width: 20%;
  height:100%
}
}
.image{
  width: 25%;
  height: 80%;
  align-items: center;
  align-content: center;
}
.imageIcon{
  width: 100%;
  height:100%;
  max-height: 60px;
  max-width: 50px;
}



@media screen and (min-width : 601px) 
{
 
  .wrapper{
    position: relative;
    border : solid 1px black;
    border-radius: 40px;
    margin-bottom: 10px;
    height: 12vh;
    display:flex;
    width: 27vw;
    flex-direction: row;
    align-items: center;
    justify-content: space-evenly; 
}
.image{
  width: 15%;
  height: 60%;
}
.imageIcon{
  max-width: 100%;
  max-height:100%;
 
}
.nom h1{
  max-width: 100%;
  font-size: 2rem;
  text-align: center;
}
.nom{
  display:block;
 width:50%;
 
}
.end{
  width: 20%;
  height:100%
}
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