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
import $ from '../../node_modules/jquery/dist/jquery.js'

export default {
  name: 'Home',
  components:{
    Details
  }, 
}
</script>

<style>

</style>