<template>
  <div class="logo">
    <img src="../../Images/LogoV1.png">
  </div>
    <form class="autoCompleteForm" autocomplete="off" action="/action_page.php">
      <div class="autocomplete" style="width:300px;">
        <input id="searchBar" @input="filterData" type="text" name="myCountry" v-model="searchBarValue" placeholder="Rechercher">
      </div>
    </form>
    <div class="rdPlantTypeWrapper">
      <div>
        <label>Fruits</label>
        <input type="radio" name="rdPlantType" value="fruit" @click="radioValueChanged('Fruit')">
      </div>
      <div>
        <label>Légumes</label>
        <input type="radio" name="rdPlantType" value="vegetable" @click="radioValueChanged('Vegetable')">
      </div>
      <div>
        <label>Tous</label>
        <input type="radio" name="rdPlantType" value="vegetable" checked @click="radioValueChanged('All')">
      </div>
    </div>
    <div class="productsGrid">
      <Plant class="plant" @popLogin="this.$emit('popLogin')" @favClicked="toggleDetails(plant.idPlant)" @click="toggleDetails(plant.idPlant)" v-for='plant in visiblePlants' :plant="plant" :isFavorite="checkIfIsFavorite(plant.idPlant)"/>    
    </div>
    <Details @close="toggleDetails" v-if="showDetails" :plant="detailedPlant"/>   
</template>

<script>
import Details from '../components/Details.vue'
import Plant from '../components/Plant.vue'
import $ from '../../node_modules/jquery/dist/jquery.js'
import toolbox from '../toolbox.js'
import autoComplete from '../autocomplete.js'

export default {
  name: 'Home',
  components:{
    Details,
    Plant
  }, 
  data(){
    return {
      plants : [],
      favorites : [],
      visiblePlants : [],
      detailedPlant : Object,
      showDetails : false,
      radioFilterValue : "All",
      searchBarValue : ""
    }
  },
  mounted(){
    this.initialisation();
    this.favorites = JSON.parse(localStorage.getItem('favorites'));
  },
  methods : {
    favClicked(num){
      toggleDetails(num);
    },
    toggleDetails(num){
      let plant = this.plants[0];
      
      for(let i = 0; i < this.plants.length; i++)
        if(this.plants[i].idPlant == num)
          plant = this.plants[i];
          
      this.showDetails = !this.showDetails;
      this.detailedPlant = plant;
    },
    async filterData(){
      await this.initialisation();
      this.visiblePlants = [];
      for(let i = 0; i < this.plants.length; i++)
        if(this.plants[i].plantName.toLowerCase().startsWith(this.searchBarValue.toLowerCase())) {
          if(this.radioFilterValue == "All" || this.plants[i].plantType == this.radioFilterValue){
            this.visiblePlants.push(this.plants[i]);
          }
        }
    },
    radioValueChanged(value){
      this.radioFilterValue = value;
      this.filterData();
    },
    async initialisation(){
      this.favorites = JSON.parse(localStorage.getItem('favorites'));
      let db = await toolbox.setDb();
      this.plants = await toolbox.fetchData(db);
      this.visiblePlants = this.plants;
      let strings = await this.getAllStrings(this.radioFilterValue);
      autoComplete.autocomplete(document.getElementById("searchBar"), strings);
      document.addEventListener('filter', (event) => {
        this.searchBarValue = event.detail;
        this.filterData();
      });
    },
    getAllStrings(plantType){
      let strings = [];
      for(let i = 0; i < this.plants.length; i++)
        if(plantType == "All" || this.plants[i].plantType == plantType)
          strings.push(this.plants[i].plantName);
      return strings;
    }, 
    checkIfIsFavorite(idPlant){
      if(this.favorites == null)
        return false;
      for(let i = 0; i < this.favorites.length; i++)
        if(this.favorites[i].tblPlant_idPlant == idPlant)
          return true;
      return false;
    }
  }
}
</script>

<style lang="scss">
body{
  background-color: #292929;
}
.logo{
  margin-top: 1%;
  height: 10vh;

  img{
    max-height: 100%;
    max-width: 100%;
  }
}
.productsGrid{
  color: #D2CCB1;
  display : grid;
  grid-template-columns : repeat(auto-fit, minmax(350px, 1fr));
  width : 85%;
  margin : 2vh 0 0 10%;
 column-gap: 30px;

}

.plant{
  background-color: #616161;

  &:hover{
    background-color : #600404;
    cursor : pointer;
  }
}
.rdPlantTypeWrapper{
  display : inline-flex;
  width: auto;
  background: #616161;
  color: #D2CCB1;
  justify-content: center;
  
  margin : 2vh 0;
  border: 1px solid;
  border-radius: 5px;

  & > div{
    display : flex;

    label{
      font-size : 2rem;
    }

    input[type=radio]{
      height: 1.5rem;
      width : 1.5rem;
      margin : auto 1rem;
    }
  }
}

.autoCompleteForm{
  display : flex;
  justify-content: center;
  

  .autocomplete{
    display : flex;
    position : relative;
  }

  .autocomplete-active{
    background : blue;
  }

  .autocomplete > *{
    width : 100%
  }

  #searchBar{
    height:4vh;

  }

  #searchBarautocomplete-list{
    position : absolute;
    top : 100%;
    background : white;
  }

  #searchBarautocomplete-list:hover{
    cursor : pointer;
  }
}

@media screen and (max-width : 600px){
  input[type=radio]{
    height : 2.5rem;
    width : 2.5rem;
  }
  
}
</style>