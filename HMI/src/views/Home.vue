<template>
  <h1>Ceci est la page d'acceuil</h1> 
  <Details></Details>
  <!-- #####LOOP TO DISPLAY EVERY PLANT
    <ul>
      {foreach $plants as $plant}
      <li>{@plant}</li>
      {/foreach}
    </ul>
  -->
</template>

<script>
import Details from '../components/Details.vue'
export default {
  name: 'Home',
  components:{
    Details
  }, 
  data(){
      return{
          products : ""
      }
  },
  mounted(){
      //this.GetAllPlants()
  },
  methods :{
    GetAllPlants(url){
      $.get(url, function(donnees, status){
          for(const [key, value] of Object.entries(donnees.results))
              ships.push(value);
          if(donnees.next != null)
              GetAllPlants(donnees.next);
      })   
    }
  }   
}
</script>

<style>

</style>