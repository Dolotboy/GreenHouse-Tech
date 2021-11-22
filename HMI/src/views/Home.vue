<template>
  <div>
    <div class="bg-image"></div>
    <div class="bg-text">
      <p>Aide à la décision</p>
      <h1>Serre-Tech</h1>
  </div>
    <div style="margin-top : 100px;" class="filtersWrapper" @click="filterData($event)">
      <form class="autoCompleteForm" autocomplete="off" action="/action_page.php">
        <div class="autocomplete" style="width:300px;">
          <input id="searchBar" @input="filterData" type="text" name="myCountry" v-model="searchBarValue" placeholder="Rechercher">
        </div>
      </form>
      <div class="filterPlantTypeWrapper">
        <div>
          <label>Fruits</label>
          <input type="radio" name="rdPlantType" value="fruit" class="typeFilter">
        </div>
        <div>
          <label>Légumes</label>
          <input type="radio" name="rdPlantType" value="vegetable" class="typeFilter">
        </div>
        <div>
          <label>Tous</label>
          <input type="radio" name="rdPlantType" value="all" class="typeFilter" checked>
        </div>
      </div>
      <div class="filterPlantFamilyWrapper">
        <div>
          <label>Famille 1</label>
          <input type="checkbox" name="familyFilter" value="family1" class="chkPlantFamily">
        </div>
        <div>
          <label>Famille 2</label>
          <input type="checkbox" name="familyFilter" value="family2" class="chkPlantFamily">
        </div>
        <div>
          <label>Tous</label>
          <input type="checkbox" name="familyFilter" value="ALL" class="chkPlantFamily"  checked>
        </div>
      </div>
      <div class="filterPlantDifficultyWrapper">
        <div>
          <label>Facile</label>
          <input type="checkbox" name="difficultyFilter" value="1" class="chkPlantDifficulty">
        </div>
        <div>
          <label>Intermédiaire</label>
          <input type="checkbox" name="difficultyFilter" value="2" class="chkPlantDifficulty">
        </div>
        <div>
          <label>Difficile</label>
          <input type="checkbox" name="difficultyFilter" value="3" class="chkPlantDifficulty">
        </div>
        <div>
          <label>Tous</label>
          <input type="checkbox" name="difficultyFilter" value="ALL" class="chkPlantDifficulty" checked>
        </div>
      </div>
      <div class="filterAlphaWrapper">
        <div>
          <label>Alphabétique</label>
          <input type="checkbox" checked id="chkAlphabetical">
        </div>
      </div>
    </div>
  </div>
  <div class="productsGrid">
    <Plant class="plant" @popLogin="this.$emit('popLogin')" @favClicked="toggleDetails(plant.idPlant)" @click="toggleDetails(plant.idPlant)" v-for='plant in visiblePlants' :plant="plant" :isFavorite="checkIfIsFavorite(plant.idPlant)"/>    
  </div>
  <Details @close="toggleDetails" v-if="showDetails" :plant="detailedPlant"/>  
</template>

<style lang="scss">

</style>
<script>
import Details from '../components/Details.vue'
import Plant from '../components/Plant.vue'
import $ from '../../node_modules/jquery/dist/jquery.js'
import toolbox from '../toolbox.js'
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
      let strings = await this.getAllStrings(this.radioFilterValue);
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
    checkIfIsFavorite(idPlant){
      if(this.favorites == null)
        return false;
      for(let i = 0; i < this.favorites.length; i++)
        if(this.favorites[i].tblPlant_idPlant == idPlant)
          return true;
      return false;
    }
  }
}
</script>

<style lang="scss">
@media screen and (min-width : 601px){
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');

body, html{
  height: 100%;
}
* {    
box-sizing: border-box;
}
.bg-image{
  background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('../assets/PlantBackground.jpg');
  height: 100vh;
  background-position: center;
  background-size: auto, cover;
  background-attachment: scroll, fixed;
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


}
body{
  background-color: #292929;
}
.logo{
  margin-top: 1%;
  height: 10vh;

  img{
    max-height: 100%;
    max-width: 100%;
  }
}
.productsGrid{
  color: #D2CCB1;
  display : grid;
  grid-template-columns : repeat(auto-fit, minmax(350px, 1fr));
  width : 85%;
  margin : 2vh 0 0 10%;
 column-gap: 30px;
 caret-color: transparent;

}
.plant{
  background-color: #616161;

  &:hover{
    background-color : #600404;
    cursor : pointer;
  }
}

.filtersWrapper{
  & > div{
    display : inline-flex;
    width: auto;
    background: #616161;
    color: #D2CCB1;
    justify-content: center;
    margin : 2vh 0;
    border: 1px solid;
    border-radius: 5px;

    & > div{
      display : flex;

      label{
        font-size : 2rem;
      }

      input[type=radio]{
        height: 1.5rem;
        width : 1.5rem;
        margin : auto 1rem;
      }
    }
  }
}
.autoCompleteForm{
  display : flex;
  justify-content: center;
  

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

  #searchBarautocomplete-list{
    position : absolute;
    top : 100%;
    background : white;
  }

  #searchBarautocomplete-list:hover{
    cursor : pointer;
  }
}

@media screen and (max-width : 600px){
  input[type=radio]{
    height : 2.5rem;
    width : 2.5rem;
  }
  .productsGrid
  {
    justify-content: center;
  }
}
</style>