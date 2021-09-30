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
      <Plant class="plant" @click="toggleDetails(plant.idPlant - 1)" v-for='plant in visiblePlants' :plant="plant"/>
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
      visiblePlants : [],
      detailedPlant : Object,
      showDetails : false,
      radioFilterValue : "All",
      searchBarValue : ""
    }
  },
  mounted(){
    this.initialisation();
  },
  methods : {
    toggleDetails(num){
      this.showDetails = !this.showDetails;
      this.detailedPlant = this.plants[num];
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
      let db = await toolbox.setDb();
      this.plants = await toolbox.fetchData(db);
      this.visiblePlants = this.plants;
      let strings = await this.getAllStrings(this.radioFilterValue);
      autoComplete.autocomplete(document.getElementById("searchBar"), strings);
      document.addEventListener('filter', (event) => {
        this.searchBarValue = event.detail;
        this.filterData();
      });
      console.log(this.plants);
    },
    getAllStrings(plantType){
      let strings = [];
      for(let i = 0; i < this.plants.length; i++)
        if(plantType == "All" || this.plants[i].plantType == plantType)
          strings.push(this.plants[i].plantName);
      return strings;
    }
  }
}
</script>

<style>
body{
  background-color: #292929;
}
.logo{
  margin-top: 1%;
  height: 10vh;
}
.logo img{
  max-height: 100%;
  max-width: 100%;
}
.productsGrid{
  color: #D2CCB1;
  display : grid;
  grid-template-columns: 50% 50%;
  width : 100%;
  margin-top: 1%;
  background-color: #616161;
}

.plant:hover{
  background-color : #600404;
  cursor : pointer;
}

.rdPlantTypeWrapper{
  display : flex;
}

.rdPlantTypeWrapper > div{
  display : flex;
}

.autoCompleteForm{
  display : flex;
  justify-content: center;
}

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

#searchBarautocomplete-list{
  position : absolute;
  top : 100%;
  background : white;
}

#searchBarautocomplete-list:hover{
  cursor : pointer;
}
</style>