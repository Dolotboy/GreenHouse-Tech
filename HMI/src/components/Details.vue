<template>
    <div class="details">
        <div class="desktop">
        <div class="left">    
            <div>
                <div class="image">
                    <img class="imageIcon" :src="plant.plantImg" alt="Image vegetable">
                </div>
            </div>        
        </div>
        <div class="right">
            <div class="rightHeader">
                <h1>{{ plant.plantName }}</h1>
                <p>{{ plant.plantFamily }}</p>
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
                <div class="close-button" @click="$emit('close')" >X</div> 
            </div>  
        </div>       
        </div>
        <div class="mobile">
        <div class="column">
        <div class="top"></div>
        <div class="detailsTop">
        <div class="image"><img class="im" :src="plant.plantImg"></div>
        <div class="infoTop" >
            <p><span>Nom : </span> {{ plant.plantName }}</p>
            <p><span>Saison : </span> {{plant.plantSeason}}</p>
            <p><span>Type : </span> {{plant.plantType}}</p>
        </div>
        </div>
        <div class="info">
            <div id="desc"><span >Description: </span><p> {{plant.plantDescription}} </p></div> 
            <div><span >Temps de conservation : </span> <p> {{plant.plantDaysConservation}} jour(s)</p></div>
            <div><span >Type de sol: </span><p> {{plant.plantGroundType}}</p></div>
            <div><span >Voisinage: </span><p> {{plant.plantBestNeighbor}}</p></div>
            <div><span >Difficulté: </span><p> {{plant.plantDifficulty}}</p></div>
            <div><span >Famille: </span><p> {{plant.plantFamily}}</p></div>
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

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap");

@media screen and (min-width : 601px) {
    .mobile{
        display:none;
    }
   
.desktop{
    position: fixed;
    top : 54%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: white;
    height: 91vh;
    width: 78vw;
    display : flex; 
    font-family: 'Roboto', sans-serif;
    padding: 5% 0 5% 0; 
    z-index: 1000;
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

    .image{
        height: 70%;
        width: 70%;
    }

    .imageIcon{
        width : 100%;
        height: 100%;
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
.close-button {
    position: absolute;
    top: 1%;
    right: 1%;
    font-size: 30pt;
    margin-right: 2%;
}
.close-button:hover{
    cursor: pointer;
    border:solid;
    border-width: 1px;
    border-color: transparent;
}
}

@media screen and (max-width : 600px) {
    .desktop{
        display:none;
    }
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
    height:98%;
    flex-direction: column;
    align-content: space-between;
 }
.detailsTop
{ 
    display: flex;
    column-gap: 5%;
    margin-top: 5%;
    height: 20%;  
}
.image{
    
    max-width: 150px;
    max-height: 150px;
}
.im{
     max-width: 100%;
    max-height:100%;
}
.infoTop
{
    display: inline-flex;
    flex-direction: column;
    height: 20vh;
    max-height: 150px;
    justify-content: space-evenly;
    min-height: 64px;
    align-content: flex-start;
    width: 60vw;
    background-color: rgb(27, 27, 27);
    text-align: start;
    p{
          
         line-height: 50%;
    }
}
.info
{
    display: flex;
    max-width: 90vw;
    min-width: 90vw;
    max-height: 48%;
    flex:1,1;
    padding-right: 5px;
    flex-direction: column;
    background-color: rgb(43, 43, 43);
    margin-top: 48px;
   min-height: auto;
    overflow-y:scroll; 
    div{
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid white;
    }
    span
    {
        display: flex;
        align-items: center;
        font-size: 16px;
        height: 100%;
    }
    p{
        display: flex;
        font-size:12px;
        text-align: justify;
        padding:1px 5px 1px 5px;
    }
    #desc{
        min-height: 48px;
    }
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
}

</style>

