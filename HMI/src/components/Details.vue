<template>
    <div class="details">
       
        <div class="column">
        <div class="top"></div>
        <div class="detailsTop">
        <div class="image"><img class="im" :src="plant.plantImg"></div>
        <div class="infoTop" >
            <p><span>Nom : </span> {{ plant.plantName }}</p>
            <p><span>Saison : </span>{{plant.plantSeason}}</p>
            <p><span>Type : </span>{{plant.plantType}}</p>
        </div>
        </div>
        <div class="info">
            <p><span >Temps de conservation :</span> {{plant.plantDaysConservation}} jour(s)</p>
            <p><span >Type de sol :</span> {{plant.plantGroundType}}</p>
            <p><span >Description :</span> {{plant.plantDescription}} </p>   
            <p><span >Voisinage :</span> {{plant.plantBestNeighbor}}</p>  
            <p><span >Difficulté :</span> {{plant.plantDifficulty}}</p>  
            <p><span >Famille :</span> {{plant.plantFamily}}</p>
        </div>
            <div class="splits">
            <button class="buttonDetails" @click="toggleCondFav">Conditions Favorables</button>
            <button class="buttonDetails" @click="toggleProblem">Problèmes</button>
            </div>
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

<style scoped lang="scss" >
.top{
  margin-top: 3%;
  height: 10vh;
  max-height:50px;
  align-items: center;
  img
  {
    max-height: 100%;
    max-width: 100%;
  }
}
.details{
  position: absolute;
    display: flex;
    caret-color: transparent;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(224, 224, 224);
    border: solid;
    border-color: black;
    width : 100%;
    height: 100%;
    padding-left: 5%;
    padding-right: 5%;
    h1{
        font-size: 35px;
    }
.column
{
    display:flex;
    flex: 1,1 auto;
    flex-direction: column;
 }
.detailsTop
{ 
    display: flex;
    column-gap: 5%;
    margin-top: 5%;
    height: 20%;  
}
.image{
    height: 20vh;
    width:35%;
    max-width: 30%;
}
.im{
     max-width: 100%;
        max-height:100%;
}
.infoTop
{
    display: flex;
    flex-direction: column;
    align-content: flex-start;
    width: 60%;
    text-align: start;
}
.info
{
    display: flex;
    max-width: 90vw;
    min-width: 90vw;
    height: 40vh;
    flex:1,1;
    flex-direction: column;
    margin-top:12%;
    text-align: start;
    overflow-y:auto; 
}
p span
{
font-size: 16px;
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
.details p:hover{
    color:dimgrey;
}
.buttonDetails{
  background-color:	black;
  color : white;
  border : none;
  padding : 10px;
  font-size : 1.4rem;
  width: 30%;
  display:inline;

  &:hover{
    opacity : .8;
    cursor : pointer;
  }
}
.splits{
    display:flex;
    height: 6%;
    margin-top:auto;
    justify-content:space-between;
}
</style>