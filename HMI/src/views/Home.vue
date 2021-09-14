<template>
  <h1>Ceci est la page d'acceuil</h1> 
  <!--<Details></Details>-->
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
      this.Initialisation()
  },
  methods :{
    async Initialisation(){
      console.log("test start");
      await this.GetAllPlants("http://www.apitestenv.pcst.xyz/api/search/plant/1");
      console.log("test end");
      console.log(this.products);
    },
    GetAllPlants(url){
      return new Promise(resolve => {
        //create XMLHttpRequest object
        let xhr = new XMLHttpRequest();
        //Initialize request xhr.open("GET",'/chose/an/url');
        xhr.open("GET",url);
        //Response type
        xhr.responseType = "json";
        //Send request to API
        xhr.send();
        // $.get(url, function(donnees, status){
        //   for(const [key, value] of Object.entries(donnees.results))
        //       products.push(value);
        //   if(donnees.next != null)
        //       GetAllPlants(donnees.next);
        // })
        console.log("test end get plants")
        resolve();
      })
    }
  }   
}
</script>

<style>

</style>