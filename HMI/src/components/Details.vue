<template>
    <div class="details">
        <div class="left">    
            <div>
                <img class="imageIcon" :src="plant.plantImg" alt="Image vegetable">
            </div>        
        </div>
        <div class="right">
            <div class="rightHeader">
                <h1>{{ plant.plantName }}</h1>
                <p>{{ plant.plantFamily }}</p>
                <!-- <h2>DIFFICULTÉ: {{ plant.plantDifficulty }}</h2> -->
                <Rating :difficulty="plant.plantDifficulty"/>
                <div class="rightDescription">
                    <h2>Description:</h2>
                    <h3>{{ plant.plantDescription }}</h3>
                    <h2>Voisinage: <span style="font-weight:550;">{{ plant.plantBestNeighbor }}</span></h2>
                    <h2>Type de sol: <span style="font-weight:550;">{{ plant.plantGroundType }}</span></h2>
                </div>
                <div class="buttonComponent">
                    <button class="buttonDetails" @click="toggleCondFav">Conditions Favorables</button>
                    <button class="buttonDetails" @click="toggleProblem">Problèmes</button>
                </div>
                    <FavCondition :plant="plant" v-if="showCondFav" @close="toggleCondFav"/>
                    <Problem :plant="plant" v-if="showProblem" @close="toggleProblem"/>
            </div>         
        </div>
    </div>
</template>

<script>
import FavCondition from './FavCondition.vue'
import Problem from './Problem.vue'
import Rating from './Rating.vue'

export default {
    components :{
        FavCondition,
        Problem,
        Rating
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
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap");

.details{
    position: absolute;
    top : 54%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: white;
    height: 91vh;
    width: 78vw;
    display : flex; 
    font-family: 'Roboto', sans-serif;
    padding: 5% 0 5% 0; 
}

.left{
    position: relative;
    width: 39vw;
    height: 100%;
    padding: 0 3vw 0 3vw;

    & > div{
        width : 100%;
        height : 100%;
        display : flex;
        justify-content: center;
        align-items: center;
    }

    .imageIcon{
        max-width : 75%;
        max-height: 75%;
    }
}

h2{      
    font-weight: bold;
    text-align : left;
    font-size: 1.8rem;
    margin-top: 30px;
}
.right{   
    position: relative;
    width: 39vw;
    height: 100%;
    padding: 0 3vw 0 3vw;
    
    h1{
        text-transform: uppercase;       
        font-weight: bold;
        text-align : left;
        font-size: 3.5rem;
        margin-bottom: 1px;
    }
    
    h3{      
        font-weight: bold;
        text-align : left;
        font-size: 1.2rem;
        margin-top: 10px;
    }

    br{
        display: block;
        margin: 7px 0;
    }

    p{
        text-align : left;
        font-size: 1.3rem;
        text-transform: uppercase;
        color: grey;
    }
    .buttonDetails{
        background-color:rgba(0,0,0,0.7);
        color : white;
        border : none;
        font-size : 1.4rem;
        width: 45%;
        margin-right: 5px;

    &:hover{
        background-color: rgba(0,0,0,1);
        cursor : pointer;
    }
}
.splits{
    display:flex;
    height: 6%;
    margin-top:auto;
    justify-content:space-between;
}

    .rightHeader{
        width: 100%;
        
    }
}
</style>
<!--<template>
    <div class="details">
       
        <div class="column">
        <div class="top"></div>
        <div class="detailsTop">
        <div class="image"><img class="im" :src="plant.plantImg"></div>
        <div class="infoTop" >
            <p><span>{{ $t("message.plantName") }} : </span> {{ plant.plantName }}</p>
            <p><span>{{ $t("message.plantSeason") }} : </span>{{plant.plantSeason}}</p>
            <p><span>{{ $t("message.plantType") }} : </span>{{plant.plantType}}</p>
        </div>
        </div>
        <div class="info">
            <div id="desc"><span >{{ $t("message.description") }}: </span><p> {{plant.plantDescription}} </p></div> 
            <div><span >{{ $t("message.daysConservation") }}: </span> <p> {{plant.plantDaysConservation}} jour(s)</p></div>
            <div><span >{{ $t("message.groundType") }}: </span><p> {{plant.plantGroundType}}</p></div>
            <div><span >{{ $t("message.neighboor") }}: </span><p> {{plant.plantBestNeighbor}}</p></div>
            <div><span >{{ $t("message.difficulty") }}: </span><p> {{plant.plantDifficulty}}</p></div>
            <div><span >{{ $t("message.family") }}: </span><p> {{plant.plantFamily}}</p></div>
        </div>
            <div class="splits">
            <button class="buttonDetails" @click="toggleCondFav">{{ $t("message.favCond") }}</button>
            <button class="buttonDetails" @click="toggleProblem">{{ $t("message.problems") }}</button>
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
@media screen and (max-width : 600px) {
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
    position: fixed;
    display: flex;
    caret-color: transparent;
    top : 50%;
    left : 50%;
    color:white;
    transform: translate(-50%, -50%);
    background: rgb(49, 51, 49);
    border: solid;
    z-index: 600;
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
