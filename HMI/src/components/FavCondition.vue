<template>
    <div class="FavConds">
        <div class="FavCondPlant">
            <h1>{{ $t("message.favCond") }}</h1>  
            <div v-for='fav in plant.favorableConditions' class="FavCondPlantInfo">
                <p>{{fav.type}} {{ $t("message.optimal") }} {{fav.min}} - {{fav.max}} {{fav.unit}}</p>
            </div> 
            
        </div>
        <div class="close-button" @click="$emit('close')" >X</div>        
    </div>
</template>

<script>
export default {
  props : ['plant']
}
</script>

<style scoped>
  @media screen and (min-width : 601px) 
  {
.FavConds{
    position :absolute;
    top : -10%;
    left: -75%;
    overflow-y: auto;
    background: gray;
    border: solid;
    border-color: black;
    width : 28vw;
    padding-left: 5%;
    padding-right: 5%;
    overflow-y: auto;
}
  }
  @media screen and (max-width : 600px) 
  {
  .FavConds
{
    height: auto;
        max-height: 80vh;
        position: absolute;
        top : 40%;
        left :30%;
        background: gray;
        border: solid;
        border-color: black;
        width : 50vw;
        padding-left: 5%;
        padding-right: 5%;
        overflow-y: auto;

}
  }
.close-button {
    position: absolute;
    top: 1%;
    right: 1%;
    font-size: 30pt;
}
.close-button:hover{
    cursor: pointer;
    border:solid;
    border-width: 1px;
    border-color: transparent;
}
.FavCondPlant h1{
    font-size: 1.2rem;
    text-decoration: underline;
}
.FavCondPlantInfo > p{
    font-size: 1.2rem;
    text-align: left;
    margin:10px 0;
    font-weight: bold;
}     
.FavCondPlant{
    display: flex;
    flex-direction: column;
    overflow-y:auto;
}

</style>