<template>
  <h1>Ceci est la page d'acceuil</h1>
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
  <Details v-if="showDetails" :plant="detailedPlant"/>
</template>

<script>
import Details from '../components/Details.vue'
import Plant from '../components/Plant.vue'
import $ from '../../node_modules/jquery/dist/jquery.js'
import toolbox from '../toolbox.js'

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
    }
  }
}
</script>

<style>
.productsGrid{
  display : grid;
  grid-template-columns: 50% 50%;
  width : 50vw;
  margin-left : 25vw;
}

.plant:hover{
  background: lightgray;
  cursor : pointer;
}

.rdPlantTypeWrapper{
  display : flex;
}

.rdPlantTypeWrapper > div{
  display : flex;
}
</style>