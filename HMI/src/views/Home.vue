<template>
  <div class="logo">
    <img src="../../Images/LogoV1.png">
  </div>
    <form autocomplete="off" action="/action_page.php">
      <div class="autocomplete" style="width:300px;">
        <input id="searchBar" type="text" name="myCountry" placeholder="Country">
      </div>
    </form>
    <div class="rdPlantTypeWrapper">
      <div>
        <label>Fruit</label>
        <input type="radio" name="rdPlantType" value="fruit" checked @click="filterData('Fruit')">
      </div>
      <div>
        <label>Légume</label>
        <input type="radio" name="rdPlantType" value="vegetable" @click="filterData('Vegetable')">
      </div>
  </div>
    <div class="productsGrid">
      <Plant class="plant" @click="toggleDetails(plant.idPlant - 1)" v-for='plant in plants' :plant="plant"/>
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
      detailedPlant : Object,
      showDetails : false
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
    async filterData(value){
      await this.initialisation();
      let plants = [];
      for(let i = 0; i < this.plants.length; i++)
        if(this.plants[i].plantType == value)
          plants.push(this.plants[i])
      this.plants = plants;
    },
    async initialisation(){
      let db = await toolbox.setDb();
      this.plants = await toolbox.fetchData(db);
      let strings = await this.getAllStrings();
      autoComplete.autocomplete(document.getElementById("searchBar"), strings);
    },
    getAllStrings(){
      let strings = [];
      for(let i = 0; i < this.plants.length; i++)
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
</style>