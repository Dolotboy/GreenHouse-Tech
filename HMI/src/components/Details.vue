<template>
    <div class="details">
        <h1>{{ plant.plantName }}</h1>
        <div>
            <p>Saison : {{plant.plantSeason}}</p>  
            <p>Temps de conservation : {{plant.plantDaysConservation}} jour(s)</p>
            <p>Type de sol : {{plant.plantGroundType}}</p>
            <p>Description : {{plant.plantDescription}}</p>   
            <p>Voisinage : {{plant.plantBestNeighbor}}</p>  
            <p>Difficulté : {{plant.plantDifficulty}}</p>  
            <p>Famille : {{plant.plantFamily}}</p>
            <button class="buttonDetails" @click="toggleCondFav">Conditions Favorables</button>
            <button class="buttonDetails" @click="toggleProblem">Problèmes</button>
        </div>
        <div class="close-button" @click="$emit('close')" >X</div>   
        <FavCondition :plant="plant" v-if="showCondFav" @close="toggleCondFav"/>
        <Problem :plant="plant" v-if="showProblem" @close="toggleProblem"/>     
    </div>
</template>



<script>
import FavCondition from './FavCondition.vue'
import Problem from './Problem.vue'

export default {
    components :{
        FavCondition,
        Problem
     },
    data(){
      return{
        showCondFav : false,
        showProblem : false

      }
  },
    props : ['plant'],

    methods: {
        toggleCondFav(){
            this.showCondFav = !this.showCondFav;
        },
        toggleProblem(){
            this.showProblem = !this.showProblem;
        }
    } 
}
</script>

<style lang="scss">
.details{
    position :absolute;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 50vw;
    padding-left: 5%;
    padding-right: 5%;

    h1{
        font-size: 35px;
    }

    .close-button {
        position: absolute;
        top: 1%;
        right: 1%;
        font-size: 30pt;

        &:hover{
            cursor: pointer;
            border:solid;
            border-width: 1px;
            border-color: grey;
        }
    }
    .detailsPlant{
        display: flex;
        flex-direction: column;

        & > p{
            font-size: 20px;
            text-align: left;
            margin:10px 0;
        }     
    }
    
}
.detailsPlantP{
        display:inline;
}

.buttonDetails{
  background-color: black;
  color : white;
  border : none;
  padding : 10px;
  font-size : 1.2rem;
  width: 30%;
  display:flex;

  &:hover{
    opacity : .8;
    cursor : pointer;
  }
}

</style>