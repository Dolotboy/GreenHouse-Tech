
<template>
 
  <div class="main">
      <div class="bg-image"></div>
      <div >
        <div class="bg-text">
          <p>{{ $t("message.decisionHelping") }}</p>
          <h1>{{ $t("message.serreTech") }}</h1>
        </div>  
      <div style="margin-top:5px;" class="logoMobile">
      <img  src="../assets/LogoV2.png" alt="Logo">
    </div>
  </div>
    
      <form class="autoCompleteForm" autocomplete="off" action="/action_page.php">
        <div class="autocomplete" style="width:300px;">
          <input id="searchBar" @input="filterData" type="text" name="myCountry" v-model="searchBarValue" v-bind:placeholder="$t('message.search')">
        </div>
      </form>
        <div class="indicator">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="filters" @click="filterData($event)">
          <ul>
          <li><a  class="item">{{ $t("message.type") }}<i class="fas fa-chevron-down"></i></a>
            <span class="accent"></span>
            <ul class="drop-down">
              <li><a><input type="radio" name="rdPlantType" value="fruit" id="difF" class="typeFilter"><label for="difF">{{ $t("message.filtreFruit") }}</label></a></li>
              <li><a><input type="radio" name="rdPlantType" value="légume" id="difL" class="typeFilter"><label for="difL">{{ $t("message.filtreLeg") }}</label></a></li>
              <li><a><input type="radio" name="rdPlantType" value="all" id="difA" class="typeFilter" checked><label for="difA">{{ $t("message.filtreAll") }}</label></a></li>
            </ul>
          </li>
          <li><a  class="item">{{$t("message.family") }}<i class="fa fa-chevron-down"></i></a>
            <span class="accent"></span>
            <ul class="drop-down">
              <li><a><input type="checkbox" class="chkPlantFamily" value="Asteracées">Asteracées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Brassicacées" >Brassicacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Chénopodiacées" >Chénopodiacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Cucurbitacées" >Cucurbitacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Fabacées" >Fabacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Liliacées" >Liliacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Ombellifères" >Ombellifères</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Poacées" >Poacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Rosacées" >Rosacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="Solonacées" >Solonacées</a></li>
              <li><a><input type="checkbox" class="chkPlantFamily" value="ALL" checked>All</a></li>
            </ul>
          </li>
          <li><a class="item" onclick="" >{{ $t("message.difficulty") }}<i class="fa fa-chevron-down"></i></a>
            <span class="accent"></span>
            <ul class="drop-down">
              <li><a><input type="checkbox" value="1" id="dif1" class="chkPlantDifficulty"><label for="dif1">{{ $t("message.easy") }}</label></a></li>
              <li><a><input type="checkbox" value="2" id="dif2" class="chkPlantDifficulty"><label for="dif2">{{ $t("message.medium") }}</label></a></li>
              <li><a><input type="checkbox" value="3" id="dif3" class="chkPlantDifficulty"><label for="dif3">{{ $t("message.hard") }}</label></a></li>
              <li><a><input type="checkbox" value="ALL" class="chkPlantDifficulty" checked>{{ $t("message.filtreAll") }}</a></li>
            </ul>
          </li>
          <li><a class="item"><input type="checkbox" id="chkAlphabetical">Alphabétique</a></li>      
          <button style="display : none;" id="BtnFr">Fr</button>
          <button style="display : none;" id="BtnEn">En</button>
        </ul>
      </div>
     
    <div class="indicator">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="productsGrid">
      <Plant class="plant" style="margin-top: 6vh" @popLogin="this.$emit('popLogin')" @favClicked="toggleDetails(plant.idPlant)" @click="toggleDetails(plant.idPlant)" v-for="plant in visiblePlants" :plant="plant" :isFavoriteProp="checkIfIsFavorite(plant.idPlant)" />
    </div>
    <Details @close="toggleDetails" v-if="showDetails" :plant="detailedPlant" />
  
    <footer>
      <p>Fait par l'équipe de l'aide à la décision pour le Département d'informatique du Cégep de Jonquière</p>
      <p class="separator"></p>
      <p>Les images ont été fournies par <span>freepngimg.com</span> que vous pouvez retrouver à l'adresse suivante : </p>
      <p>https://freepngimg.com/vegetables</p>
    </footer>
  
  </div>
</template>

<style lang="scss">

</style>
<script>

import Details from '../components/Details.vue'
import Plant from '../components/Plant.vue'
import $ from '../../node_modules/jquery/dist/jquery.js'
import toolbox from '../toolbox.js'
//import autoComplete, { autocomplete } from 'https://wiki.pcst.xyz/autocomplete.js'
import autoComplete, { autocomplete } from '../autocomplete.js'

export default {
  name: 'Home',
  components:{
    Details,
    Plant
  }, 
  
  data(){
    return {
      plants : [],
      favorites : [],
      visiblePlants : [],
      detailedPlant : Object,
      showDetails : false,
      radioFilterValue : "All",
      searchBarValue : ""
    }
  },
  mounted(){
    
    this.initialisation();
    this.favorites = JSON.parse(localStorage.getItem('favorites'));
    //animations for filters
      $("li").mouseover(function(){
        $(this).find('.drop-down').slideDown(300);
        $(this).find(".accent").addClass("animate");
      }).mouseleave(function(){
        $(this).find(".drop-down").slideUp(300);
          $(this).find(".accent").removeClass("animate");
      });
  },
  methods : {
    filterAlphabetical(){
      if(document.querySelector("#chkAlphabetical").checked)
        this.visiblePlants.sort((a, b) => a.plantName.localeCompare(b.plantName))
    },
    filterType(){
      let typeRadios = document.querySelectorAll(".typeFilter");
      let dataType = [];
      let tempPlants = [];

      for(let i=0; i<typeRadios.length; i++)
        if(typeRadios[i].checked)
          dataType.push(typeRadios[i].value.toUpperCase());

      //if all is checked, do not filter
      if(dataType.includes("ALL"))
        return;

      for(let i= 0; i < this.visiblePlants.length; i++)
        if(dataType.includes(this.visiblePlants[i].plantType.toUpperCase()))
          tempPlants.push(this.visiblePlants[i]);

      this.visiblePlants = tempPlants;
    },
    filterFamily(){
      let familyCheckboxes = document.querySelectorAll(".chkPlantFamily");
      let dataFamily = [];
      let tempPlants = [];

      this.toggleCheckboxAll(".chkPlantFamily");
      for(let i=0; i<familyCheckboxes.length; i++)
        if(familyCheckboxes[i].checked)
          dataFamily.push(familyCheckboxes[i].value.toUpperCase());

      //if all is checked, do not filter
      if(dataFamily.includes("ALL"))
        return;

      for(let i = 0; i < this.visiblePlants.length; i++)
        if(dataFamily.includes(this.visiblePlants[i].plantFamily.toUpperCase()))
          tempPlants.push(this.visiblePlants[i]);

      this.visiblePlants = tempPlants;
    },
    filterDifficulty(){
      let difficultyCheckboxes = document.querySelectorAll(".chkPlantDifficulty");
      let dataDifficulty = [];
      let tempPlants = [];

      this.toggleCheckboxAll(".chkPlantDifficulty");  
      for(let i=0; i<difficultyCheckboxes.length; i++)
        if(difficultyCheckboxes[i].checked)
          dataDifficulty.push(difficultyCheckboxes[i].value);

      //if all is checked, do not filter
      if(dataDifficulty.includes("ALL"))
        return;

      for(let i = 0; i < this.visiblePlants.length; i++)
        if(dataDifficulty.includes(this.visiblePlants[i].plantDifficulty.toString()))
          tempPlants.push(this.visiblePlants[i]);

      this.visiblePlants = tempPlants;
    },
    async filterData(event){
      if(event != null){
        let el = event.target;
        if(el.type == "checkbox" && el.value.toUpperCase() == "ALL" && el.className.startsWith("chk"))
          this.setFilterToDefault(el.className);
      }
      this.visiblePlants = this.plants;

      if(this.searchBarValue != null && this.searchBarValue != ""){
        console.log(this.visiblePlants);
        let tempPlants = [];
        for(let i = 0; i< this.visiblePlants.length; i++)
          if(this.visiblePlants[i].plantName.toUpperCase().startsWith(this.searchBarValue.toUpperCase()))
            tempPlants.push(this.visiblePlants[i]);
        this.visiblePlants = tempPlants;
        console.log("god")
        return;
      }
          
      this.filterType();
      this.filterFamily();
      this.filterDifficulty();
      this.filterAlphabetical();    
    },
    toggleCheckboxAll(selector){
      let checkboxes = document.querySelectorAll(selector);
      let cpt = 0; 
      let chkAll = null;

      for(let i = 0; i < checkboxes.length; i++){
        if(checkboxes[i].checked){
          cpt++;
        }
        if(checkboxes[i].value.toUpperCase() == "ALL")
          chkAll = checkboxes[i];
      }

      if(chkAll == null)
        return;
      if(cpt == 0)
        chkAll.checked = true;
      else if (cpt > 1)
        chkAll.checked = false;
    },
    setFilterToDefault(selector){
      let checkboxes = document.querySelectorAll("." + selector);
      for(let i = 0; i < checkboxes.length; i++)
        if(checkboxes[i].value.toUpperCase() == "ALL")
          checkboxes[i].checked = true;
        else
          checkboxes[i].checked = false;
    },
    toggleDetails(num){
      let plant = this.plants[0];
      
      for(let i = 0; i < this.plants.length; i++)
        if(this.plants[i].idPlant == num)
          plant = this.plants[i];
          
      this.showDetails = !this.showDetails;
      this.detailedPlant = plant;
    },
    async initialisation(){
      this.favorites = JSON.parse(localStorage.getItem('favorites'));
      let db = await toolbox.setDb();
      this.plants = await toolbox.fetchData(db);
      this.visiblePlants = this.plants;
      let strings = this.getAllStrings(this.radioFilterValue);
      autoComplete.autocomplete(document.getElementById("searchBar"), strings);
      document.addEventListener('filter', (event) => {
        this.searchBarValue = event.detail;
        this.filterData(null);
      });
    },
    getAllStrings(plantType){
      let strings = [];
      for(let i = 0; i < this.visiblePlants.length; i++)
          strings.push(this.plants[i].plantName);
      return strings;
    },
    checkIfIsFavorite(idPlant) {
      console.log("Favorites : " + JSON.stringify(this.favorites));
      if (this.favorites == null) 
        return false;
      for (let i = 0; i < this.favorites.length; i++)
        if (this.favorites[i].tblPlant_idPlant == idPlant) 
          return true;
      return false;
    }
  }
}
</script>

<style  lang="scss">
@media screen and (min-width : 601px){
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');

.productsGrid{
  color: #FFFFFF;
  text-shadow:  0 -2px 10px #f0e567;
  display : grid;
  grid-template-columns : repeat(auto-fit, minmax(500px, 1fr));
  width : 100%;
  padding : 2vh 5vw 0 5vw;
  column-gap: 30px;
  row-gap: 30px;
}
.autoCompleteForm{
  display : inline-block;
  float: right;
  padding: 1vh 5vw 1vh 5vw;

  .autocomplete{
    display : block;
    position : relative;
  }

  .autocomplete-active{
    background : blue;
  }

  .autocomplete > *{
    width : 100%
  }

  #searchBar{
    height:4vh;

  }
}
footer{
  caret-color: transparent;
  display : flex;
  justify-content: center;
  width : 100%;
  align-items: center;
  flex-direction: column;
  font-size: 1.2rem;   
  z-index: 1000; 
  background-color: rgba(0,0,0,0.9);
  height: 18vh;
  margin-top : 7vh;

  p{
    color : white;
    margin : 0;
  }

  span{
    font-style: italic;
  }

  .separator{
    height : 1vh;
  }
}
@keyframes animate {
  0%{
    border-color:#fff;
    transform:translate(0,0);
  }
   20%{
    border-color:#fff;
     transform:translate(15px,15px);
  }
   20.1%,100%{
    border-color:#007200;
  }
}
  #searchBarautocomplete-list:hover{
    cursor : pointer;
  }
  .filters {
  height: 30px;
  ul {
  width:  70vw;
  margin: 0;

  li {
    float: left;
    list-style: none;
    margin-right: 10px;
    position: relative;
    z-index : 10;
       
    a {
      text-transform: uppercase;
      position: relative;
      text-decoration: none;
      color: white;
      background-color: black;
      border: 1px solid #fff;
      letter-spacing: 1px;
      padding: 10px 15px 10px 25px;
      display: block;
      width: 200px;
      z-index: 500;

      i {
        font-size: 12px ;
        position: absolute;
        right: 10px;
        top: 14px;
        color: red;
      }
    }
    
    .drop-down {
      position: absolute;
      padding: 0;
      width: 100%;
      display: none;
      margin: 0;
      left: 0;
      z-index: 0;
      text-align: left;
      
      
      input {
        display: inline-block;
      }  
      li {
        position: relative;
        float: none;
        z-index : 10;
        width: 100%;
        
        a {
        border-top: none;
          width: 100%;
          font-size: 14px;
          padding: 3px 2px 3px 2px;
          height: 5vh;
          
          &:hover {
            background: #000000;
            color: #ffffff;
          }
        }
      }
      
      li:nth-of-type(1) a {
        border-top: none;
      }
    }
  }
  }
}
.bg-image{
  height: 100vh;
}
.bg-text{
  color: #fff;
  font-family: 'Roboto', sans-serif;
  position: absolute;
  font-weight: 800;
  top: 50%;
  left: 50%;
  text-transform: uppercase;
  transform: translate(-50%, -50%);

    p{
      font-size: 20px;
      font-weight: 200;
    }   
    h1{
      font-size: 90px;
      font-weight: 600;
    }
}

.logo{
  margin-top: 1%;
  height: 10vh;

  img{
    width: 50px;
    max-height: 100%;
    max-width: 100%;
  }
}
}






.logoMobile{
  display:none;
}
body, html{
  height: 100vw;
  background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('../assets/PlantBackground.png');
  background-position: center;
  background-size: auto, cover;
  background-attachment: fixed;
}
* {    
box-sizing: border-box;
}
html{
  scroll-behavior: smooth;
}




.indicator{
  position:absolute;
  width:50px;
  height:50px;
  transform:rotate(45deg) translate(-50%, -50%);
  left : 50%; 
  top : 80%;

  span{
    position:absolute;
    left:0;
    top:0;
    width:100%;
    height:100%;
    box-sizing:border-box;
    border:none;
    border-bottom:3px solid #fff;
    border-right:3px solid #fff;
    animation:animate 1s linear infinite;
    &:nth-child(1){
      top:-30px;
      left:-30px;
      animation-delay:0s;
    }
    &:nth-child(2){
      top:-15px;
      left:-15px;
      animation-delay:0.2s;
    }
    &:nth-child(3){
      top:0;
      left:0;
      animation-delay:0.4s;
    }
    &:nth-child(4){
      top:15px;
      left:15px;
      animation-delay:0.6s;
    }
    &:nth-child(5){
      top:30px;
      left:30px;
      animation-delay:0.8s;
    }
  }
}
@keyframes animate{
  0%{
    border-color:#fff;
    transform:translate(0,0);
  }
   20%{
    border-color:#fff;
     transform:translate(15px,15px);
  }
   20.1%,100%{
    border-color:#007200;
  }
}



.accent {
  top: 0;
  left: 0;
  width: 0%;
  height: 100%;
  background: blue;
  position: relative;
  transition: 0.3s ease;
}

.animate {
  width: 20%;
  transition: 0.3s ease;
}
.item{
  background-color: rgba(0,0,0,0.9);
  color: white;
    
    &:hover{
      color:black;
      background: white;
    }
    
}


.plant{
  background: rgba(255, 255, 255, .1);
  box-shadow: 10px 10px 5px rgba(255, 255, 255, .2);
  height: 15vh;
  
  &:hover{
    cursor : pointer;
    background: rgba(255, 255, 255, .05);
    box-shadow: 10px 10px 5px rgba(255, 255, 255, .15);
  }
  
}

/* sépraratiom */

@media screen and (max-width : 600px) 
{
  .productsGrid
  {
  overflow-y: auto;
  color: #FFFFFF;
  text-shadow:  0 -2px 10px #f0e567;
  display : grid;
  grid-template-columns : repeat(auto-fit, minmax(400px, 1fr));
  justify-content: center;
  justify-items: center;
  width : 100vw;
  column-gap: 30px;
  }
  .bg-text{
  color: #fff;
  font-family: 'Roboto', sans-serif;
  font-weight: 800;
  width: 100vw;
  text-align: center;
  text-transform: uppercase;

    p{
      font-size: 20px;
      font-weight: 200;
    }   
    h1{
      font-size: 45px;
      font-weight: 600;
    }
}
.bg-image{

display: none;
}

 .autoCompleteForm{
  display : inline-block;
  padding: 1vh 5vw 1vh 5vw;

  .autocomplete{
    display : block;
    position : relative;
  }

  .autocomplete-active{
    background : blue;
  }

  .autocomplete > *{
    width : 100%
  }

  #searchBar{
    height:5vh;
    margin-top: 3%;
    margin-bottom: 4%;
    min-height: 40px;
    z-index: 10;

  }
  #searchBarautocomplete-list{
    position : absolute;
    top : 100%;
    background : rgba(0, 0, 0, 0.521);
    z-index: 8;
    font-size: 32px;
    color: white;
  }

  #searchBarautocomplete-list:hover{
    cursor : pointer;
  }
}

  .logoMobile{
    display: inline-flex;
    width: 100%;
    margin-bottom: 5%;
    max-height: 35vh;
    justify-content: center;
    img{
        width:50vw;
        min-height: 220px;
        min-width: 220px;
        max-width: 220px;
        max-height: 220px;
    }
}
  .indicator{
    display:none;
  }
 .filters {
  height:35px;
  
  ul {
    width: 100vw;
    padding-left:5%;
    padding-right: 5%;

  li {
    float: left;
    font-size: 9px;
    list-style: none;
    position: relative;
    z-index : 5;
    width: 22vw;
       
    a {
      text-transform: uppercase;
      position: relative;
      text-decoration: none;
      color: white;
      background-color: black;
      border: 1px solid #fff;
      height: 40px;
      letter-spacing: 1px;
      padding: 9px 5px 9px 5px;
      display: block;
      z-index: 5;

      i {
        font-size: 8px !important;
        position: absolute;
        right: 10px;
        top: 14px;
        color: red;
      }
    }
    
    .drop-down {
      position: absolute;
      padding: 0;
      width: 100%;
      display: none;
      margin: 0;
      left: 0;
      z-index: 0;
      text-align: left;
      
      input {
        display: inline-block;
      }  
      li {
        position: relative;
        float: none;
        z-index : 10;
        width: 100%;
        
        a {
          border-top: none;
          width: 100%;
          font-size: 9px;
          padding: 3px 2px 3px 2px;
          
          
          &:hover {
            background: #000000;
            color: #ffffff;
          }
        }
      }
      
      li:nth-of-type(1) a {
        border-top: none;
      }
    }
  }
}
  }
}
</style>