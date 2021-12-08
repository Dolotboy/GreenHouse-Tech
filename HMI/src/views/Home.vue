
<template>
<<<<<<< HEAD
  <div class="main">
    <div class="bg-image"></div>
    <div>
      <div class="bg-text">
        <p>{{ $t("message.decisionHelping") }}</p>
        <h1>{{ $t("message.serreTech") }}</h1>
=======
  <div>
    <div class="main">
      <div class="bg-image"></div>
      <div>
        <div class="bg-text">
          <p>Aide à la décision</p>
          <h1>Serre-Tech</h1>
        </div>  
      </div>      
  </div>
      <form class="autoCompleteForm" autocomplete="off" action="/action_page.php">
        <div class="autocomplete" style="width:300px;">
          <input id="searchBar" @input="filterData" type="text" name="myCountry" v-model="searchBarValue" placeholder="Rechercher">
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
          <li><a class="item">Type<i class="fas fa-chevron-down"></i></a>
            <span class="accent"></span>
            <ul class="drop-down">
              <li><a><input type="radio" name="rdPlantType" value="fruit" class="typeFilter">Fruits</a></li>
              <li><a><input type="radio" name="rdPlantType" value="légume" class="typeFilter">Légumes</a></li>
              <li><a><input type="radio" name="rdPlantType" value="all" class="typeFilter" checked>Tous</a></li>
            </ul>
          </li>
          <li><a class="item">Famille<i class="fa fa-chevron-down"></i></a>
            <span class="accent"></span>
            <ul class="drop-down">
              <li><a href="#"><input type="checkbox" class="chkPlantFamily">Blue</a></li>
              <li><a href="#"><input type="checkbox" class="chkPlantFamily">Black</a></li>
              <li><a href="#"><input type="checkbox" class="chkPlantFamily">Orange</a></li>
              <li><a href="#"><input type="checkbox" class="chkPlantFamily">Green</a></li>
              <li><a href="#"><input type="checkbox" class="chkPlantFamily">Red</a></li>
              <li><a href="#"><input type="checkbox" class="chkPlantFamily" value="ALL" checked>All</a></li>
            </ul>
          </li>
          <li><a class="item">Difficulté<i class="fa fa-chevron-down"></i></a>
            <span class="accent"></span>
            <ul class="drop-down">
              <li><a><input type="checkbox" value="1" class="chkPlantDifficulty">Facile</a></li>
              <li><a><input type="checkbox" value="2" class="chkPlantDifficulty">Intermédiaire</a></li>
              <li><a><input type="checkbox" value="3" class="chkPlantDifficulty">Difficile</a></li>
              <li><a><input type="checkbox" value="ALL" class="chkPlantDifficulty" checked>Tous</a></li>
            </ul>
          </li>
          <li class="item"><a><input type="checkbox" id="chkAlphabetical">Alphabétique</a></li>          
        </ul>
>>>>>>> request#121
      </div>
      <div class="logoMobile">
        <img src="../assets/LogoV2.png" alt="Logo" />
      </div>
<<<<<<< HEAD
    </div>
    <form class="autoCompleteForm" autocomplete="off" action="/action_page.php">
      <div class="autocomplete" style="width: 300px">
        <input
          id="searchBar"
          @input="filterData"
          type="text"
          name="myCountry"
          v-model="searchBarValue"
          v-bind:placeholder="$t('message.search')"
        />
=======
        <Details @close="toggleDetails" v-if="showDetails" :plant="detailedPlant"/>
>>>>>>> request#121
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
        <li>
          <a class="item"
            >{{ $t("message.type") }}<i class="fas fa-chevron-down"></i
          ></a>
          <span class="accent"></span>
          <ul class="drop-down">
            <li>
              <a
                ><input
                  type="radio"
                  name="rdPlantType"
                  value="fruit"
                  class="typeFilter"
                />{{ $t("message.filtreFruit") }}</a
              >
            </li>
            <li>
              <a
                ><input
                  type="radio"
                  name="rdPlantType"
                  value="légume"
                  class="typeFilter"
                />{{ $t("message.filtreLeg") }}</a
              >
            </li>
            <li>
              <a
                ><input
                  type="radio"
                  name="rdPlantType"
                  value="all"
                  class="typeFilter"
                  checked
                />{{ $t("message.filtreAll") }}</a
              >
            </li>
          </ul>
        </li>
        <li>
          <a class="item"
            >{{ $t("message.famille") }}<i class="fa fa-chevron-down"></i
          ></a>
          <span class="accent"></span>
          <ul class="drop-down">
            <li>
              <a href="#"
                ><input type="checkbox" class="chkPlantFamily" />Blue</a
              >
            </li>
            <li>
              <a href="#"
                ><input type="checkbox" class="chkPlantFamily" />Black</a
              >
            </li>
            <li>
              <a href="#"
                ><input type="checkbox" class="chkPlantFamily" />Orange</a
              >
            </li>
            <li>
              <a href="#"
                ><input type="checkbox" class="chkPlantFamily" />Green</a
              >
            </li>
            <li>
              <a href="#"
                ><input type="checkbox" class="chkPlantFamily" />Red</a
              >
            </li>
            <li>
              <a href="#"
                ><input
                  type="checkbox"
                  class="chkPlantFamily"
                  value="ALL"
                  checked
                />{{ $t("message.filtreAll") }}</a
              >
            </li>
          </ul>
        </li>
        <li>
          <a class="item"
            >{{ $t("message.difficulty") }}<i class="fa fa-chevron-down"></i
          ></a>
          <span class="accent"></span>
          <ul class="drop-down">
            <li>
              <a
                ><input
                  type="checkbox"
                  value="1"
                  class="chkPlantDifficulty"
                />{{ $t("message.easy") }}</a
              >
            </li>
            <li>
              <a
                ><input
                  type="checkbox"
                  value="2"
                  class="chkPlantDifficulty"
                />{{ $t("message.medium") }}</a
              >
            </li>
            <li>
              <a
                ><input
                  type="checkbox"
                  value="3"
                  class="chkPlantDifficulty"
                />{{ $t("message.hard") }}</a
              >
            </li>
            <li>
              <a
                ><input
                  type="checkbox"
                  value="ALL"
                  class="chkPlantDifficulty"
                  checked
                />{{ $t("message.filtreAll") }}</a
              >
            </li>
          </ul>
        </li>
        <li class="filterAlphaWrapper">
          <div>
            <label>{{ $t("message.alphabetical") }}</label>
            <div
              style="
                color: white;
                background-color: black;
                border: solid 1px white;
                height: 35px;
              "
            >
              <label>Alphabétique</label>
              <input type="checkbox" checked id="chkAlphabetical" />
            </div>
          </div>
        </li>
        <button id="BtnFr">Fr</button>
        <button id="BtnEn">En</button>
      </ul>
    </div>
    <div class="productsGrid">
      <Plant class="plant" style="margin-top: 6vh" @popLogin="this.$emit('popLogin')" @favClicked="toggleDetails(plant.idPlant)" @click="toggleDetails(plant.idPlant)" v-for="plant in visiblePlants" :plant="plant" :isFavorite="checkIfIsFavorite(plant.idPlant)" />
    </div>
    <Details @close="toggleDetails" v-if="showDetails" :plant="detailedPlant" />
  </div>
</template>

<style lang="scss">
</style>
<script>
import Details from "../components/Details.vue";
import Plant from "../components/Plant.vue";
import $ from "../../node_modules/jquery/dist/jquery.js";
import toolbox from "../toolbox.js";
//import autoComplete, { autocomplete } from 'https://wiki.pcst.xyz/autocomplete.js'
import autoComplete, { autocomplete } from "../autocomplete.js";

export default {
  name: "Home",
  components: {
    Details,
    Plant,
  },

  data() {
    return {
      plants: [],
      favorites: [],
      visiblePlants: [],
      detailedPlant: Object,
      showDetails: false,
      radioFilterValue: "All",
      searchBarValue: "",
    };
  },
  mounted() {
    this.initialisation();
    this.favorites = JSON.parse(localStorage.getItem("favorites"));
    //animations for filters
    $("li")
      .mouseover(function () {
        $(this).find(".drop-down").slideDown(300);
        $(this).find(".accent").addClass("animate");
      })
      .mouseleave(function () {
        $(this).find(".drop-down").slideUp(300);
        $(this).find(".accent").removeClass("animate");
      });
  },
  methods: {
    filterAlphabetical() {
      if (document.querySelector("#chkAlphabetical").checked)
        this.visiblePlants.sort((a, b) =>
          a.plantName.localeCompare(b.plantName)
        );
    },
    filterType() {
      let typeRadios = document.querySelectorAll(".typeFilter");
      let dataType = [];
      let tempPlants = [];

      for (let i = 0; i < typeRadios.length; i++)
        if (typeRadios[i].checked)
          dataType.push(typeRadios[i].value.toUpperCase());

      //if all is checked, do not filter
      if (dataType.includes("ALL")) return;

      for (let i = 0; i < this.visiblePlants.length; i++)
        if (dataType.includes(this.visiblePlants[i].plantType.toUpperCase()))
          tempPlants.push(this.visiblePlants[i]);

      this.visiblePlants = tempPlants;
    },
    filterFamily() {
      let familyCheckboxes = document.querySelectorAll(".chkPlantFamily");
      let dataFamily = [];
      let tempPlants = [];

      this.toggleCheckboxAll(".chkPlantFamily");
      for (let i = 0; i < familyCheckboxes.length; i++)
        if (familyCheckboxes[i].checked)
          dataFamily.push(familyCheckboxes[i].value.toUpperCase());

      //if all is checked, do not filter
      if (dataFamily.includes("ALL")) return;

      for (let i = 0; i < this.visiblePlants.length; i++)
        if (
          dataFamily.includes(this.visiblePlants[i].plantFamily.toUpperCase())
        )
          tempPlants.push(this.visiblePlants[i]);

      this.visiblePlants = tempPlants;
    },
    filterDifficulty() {
      let difficultyCheckboxes = document.querySelectorAll(
        ".chkPlantDifficulty"
      );
      let dataDifficulty = [];
      let tempPlants = [];

      this.toggleCheckboxAll(".chkPlantDifficulty");
      for (let i = 0; i < difficultyCheckboxes.length; i++)
        if (difficultyCheckboxes[i].checked)
          dataDifficulty.push(difficultyCheckboxes[i].value);

      //if all is checked, do not filter
      if (dataDifficulty.includes("ALL")) return;

      for (let i = 0; i < this.visiblePlants.length; i++)
        if (
          dataDifficulty.includes(
            this.visiblePlants[i].plantDifficulty.toString()
          )
        )
          tempPlants.push(this.visiblePlants[i]);

      this.visiblePlants = tempPlants;
    },
    async filterData(event) {
      if (event != null) {
        let el = event.target;
        if (
          el.type == "checkbox" &&
          el.value.toUpperCase() == "ALL" &&
          el.className.startsWith("chk")
        )
          this.setFilterToDefault(el.className);
      }
      this.visiblePlants = this.plants;

      if (this.searchBarValue != null && this.searchBarValue != "") {
        console.log(this.visiblePlants);
        let tempPlants = [];
        for (let i = 0; i < this.visiblePlants.length; i++)
          if (
            this.visiblePlants[i].plantName
              .toUpperCase()
              .startsWith(this.searchBarValue.toUpperCase())
          )
            tempPlants.push(this.visiblePlants[i]);
        this.visiblePlants = tempPlants;
        console.log("god");
        return;
      }

      this.filterType();
      this.filterFamily();
      this.filterDifficulty();
      this.filterAlphabetical();
    },
    toggleCheckboxAll(selector) {
      let checkboxes = document.querySelectorAll(selector);
      let cpt = 0;
      let chkAll = null;

      for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
          cpt++;
        }
        if (checkboxes[i].value.toUpperCase() == "ALL") chkAll = checkboxes[i];
      }

      if (chkAll == null) return;
      if (cpt == 0) chkAll.checked = true;
      else if (cpt > 1) chkAll.checked = false;
    },
    setFilterToDefault(selector) {
      let checkboxes = document.querySelectorAll("." + selector);
      for (let i = 0; i < checkboxes.length; i++)
        if (checkboxes[i].value.toUpperCase() == "ALL")
          checkboxes[i].checked = true;
        else checkboxes[i].checked = false;
    },
    toggleDetails(num) {
      let plant = this.plants[0];

      for (let i = 0; i < this.plants.length; i++)
        if (this.plants[i].idPlant == num) plant = this.plants[i];

      this.showDetails = !this.showDetails;
      this.detailedPlant = plant;
    },
    async initialisation() {
      this.favorites = JSON.parse(localStorage.getItem("favorites"));
      let db = await toolbox.setDb();
      this.plants = await toolbox.fetchData(db);
      this.visiblePlants = this.plants;
      let strings = this.getAllStrings(this.radioFilterValue);
      autoComplete.autocomplete(document.getElementById("searchBar"), strings);
      document.addEventListener("filter", (event) => {
        this.searchBarValue = event.detail;
        this.filterData(null);
      });
    },
    getAllStrings(plantType) {
      let strings = [];
      for (let i = 0; i < this.visiblePlants.length; i++)
        strings.push(this.plants[i].plantName);
      return strings;
    },
    checkIfIsFavorite(idPlant) {
      if (this.favorites == null) return false;
      for (let i = 0; i < this.favorites.length; i++)
        if (this.favorites[i].tblPlant_idPlant == idPlant) return true;
      return false;
    },
  },
};
</script>

<style  lang="scss">
@media screen and (min-width: 601px) {
  @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap");

  .productsGrid {
    color: #ffffff;
    text-shadow: 0 -2px 10px #f0e567;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    width: 100%;
    padding: 2vh 5vw 0 5vw;
    column-gap: 30px;
    row-gap: 30px;
  }
  .autoCompleteForm {
    display: inline-block;
    float: right;
    padding: 1vh 5vw 1vh 5vw;

    .autocomplete {
      display: block;
      position: relative;
    }

    .autocomplete-active {
      background: blue;
    }

    .autocomplete > * {
      width: 100%;
    }

    #searchBar {
      height: 4vh;
    }
    #searchBarautocomplete-list {
      position: absolute;
      top: 100%;
      background: white;
    }

    #searchBarautocomplete-list:hover {
      cursor: pointer;
    }
  }

  .filters {
    height: 30px;
    ul {
      width: 70vw;
      margin: 0;

      li {
        float: left;
        list-style: none;
        margin-right: 10px;
        position: relative;
        z-index: 10;

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
          width: 150px;
          z-index: 500;

          i {
            font-size: 12px;
            position: absolute;
            right: 10px;
            top: 14px;
            color: red;
          }
        }

        .drop-down {
          position: absolute;
          padding: 0;
          display: none;
          margin: 0;
          left: 0;
          z-index: 0;

          input {
            display: inline-block;
            float: left;
          }
          li {
            position: relative;
            float: none;
            z-index: 10;

            a {
              border-top: none;
              width: 150px;

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

  .bg-image {
    height: 100vh;
  }
  .bg-text {
    color: #fff;
    font-family: "Roboto", sans-serif;
    position: absolute;
    font-weight: 800;
    top: 50%;
    left: 50%;
    text-transform: uppercase;
    transform: translate(-50%, -50%);

    p {
      font-size: 20px;
      font-weight: 200;
    }
    h1 {
      font-size: 90px;
      font-weight: 600;
    }
  }

  .logo {
    margin-top: 1%;
    height: 10vh;

    img {
      max-height: 100%;
      max-width: 100%;
    }
  }
}

.logoMobile {
  display: none;
}
body,
html {
  height: 100vw;
  background-image: linear-gradient(
      180deg,
      rgba(0, 0, 0, 0.6),
      rgba(0, 0, 0, 0.6)
    ),
    url("../assets/PlantBackground.png");
  background-position: center;
  background-size: auto, cover;
  background-attachment: fixed;
}
* {
  box-sizing: border-box;
}
html {
  scroll-behavior: smooth;
}

.indicator {
  position: absolute;
  width: 50px;
  height: 50px;
  transform: rotate(45deg) translate(-50%, -50%);
  left: 50%;
  top: 80%;

  span {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    border: none;
    border-bottom: 3px solid #fff;
    border-right: 3px solid #fff;
    animation: animate 1s linear infinite;
    &:nth-child(1) {
      top: -30px;
      left: -30px;
      animation-delay: 0s;
    }
    &:nth-child(2) {
      top: -15px;
      left: -15px;
      animation-delay: 0.2s;
    }
    &:nth-child(3) {
      top: 0;
      left: 0;
      animation-delay: 0.4s;
    }
    &:nth-child(4) {
      top: 15px;
      left: 15px;
      animation-delay: 0.6s;
    }
    &:nth-child(5) {
      top: 30px;
      left: 30px;
      animation-delay: 0.8s;
    }
  }
}
@keyframes animate {
  0% {
    border-color: #fff;
    transform: translate(0, 0);
  }
  20% {
    border-color: #fff;
    transform: translate(15px, 15px);
  }
<<<<<<< HEAD
  20.1%,
  100% {
    border-color: #007200;
=======
}


.filters ul {
width: 1200px;
padding: 0 0 0 5vw;
float: left;

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
      z-index: 5000;

      i {
        font-size: 12px !important;
        position: absolute;
        right: 10px;
        top: 14px;
        color: red;
      }
    }
    
    .drop-down {
      position: absolute;
      padding: 0;
      display: none;
      margin: 0;
      left: 0;
      z-index: 0;
      width: 200px;
      
      input {
        display: inline-block;
        float: left;
      }  
      li {
        position: relative;
        float: none;
        z-index : 10;
        
        
        a {
          border-top: none;
          width: 200px;
          
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
>>>>>>> request#121
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
.item {
  background-color: rgba(0, 0, 0, 0.9);
  color: white;

  &:hover {
    color: black;
    background: white;
  }
}

.plant {
  background: rgba(255, 255, 255, 0.1);
  box-shadow: 10px 10px 5px rgba(255, 255, 255, 0.2);
  height: 15vh;

  &:hover {
    cursor: pointer;
    background: rgba(255, 255, 255, 0.05);
    box-shadow: 10px 10px 5px rgba(255, 255, 255, 0.15);
  }
}

/* sépraratiom */

@media screen and (max-width: 600px) {
  .productsGrid {
    overflow-y: auto;
    color: #ffffff;
    text-shadow: 0 -2px 10px #f0e567;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
    justify-content: center;
    justify-items: center;
    width: 100vw;
    column-gap: 30px;
  }
  .bg-text {
    color: #fff;
    font-family: "Roboto", sans-serif;
    font-weight: 800;
    width: 100vw;
    text-align: center;
    text-transform: uppercase;

    p {
      font-size: 20px;
      font-weight: 200;
    }
    h1 {
      font-size: 45px;
      font-weight: 600;
    }
  }
  .bg-image {
  }

  .autoCompleteForm {
    display: inline-block;
    padding: 1vh 5vw 1vh 5vw;

    .autocomplete {
      display: block;
      position: relative;
    }

    .autocomplete-active {
      background: blue;
    }

    .autocomplete > * {
      width: 100%;
    }

    #searchBar {
      height: 5vh;
      margin-top: 3%;
      margin-bottom: 4%;
      min-height: 40px;
      z-index: 10;
    }
    #searchBarautocomplete-list {
      position: absolute;
      top: 100%;
      background: white;
      z-index: 8;
      font-size: 20px;
    }

    #searchBarautocomplete-list:hover {
      cursor: pointer;
    }
  }

  .logoMobile {
    display: flex;
    width: 100%;
    margin-bottom: 5%;
    max-height: 35vh;
    justify-content: center;
    img {
      width: 50vw;
      min-width: 200px;
      min-width: 200px;
      max-width: 250px;
      max-height: 250px;
    }
  }
  .indicator {
    display: none;
  }
  .filters {
    height: 30px;

    ul {
      width: 100vw;
      padding-left: 5vw;
      padding-right: 5vw;

      li {
        float: left;
        font-size: 9px;
        list-style: none;
        position: relative;
        z-index: 5;
        width: 22vw;

        a {
          text-transform: uppercase;
          position: relative;
          text-decoration: none;
          color: white;
          background-color: black;
          border: 1px solid #fff;
          height: 35px;
          letter-spacing: 1px;
          padding: 12px 10px 12px 10px;
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
            z-index: 10;
            width: 100%;

            a {
              border-top: none;
              width: 100%;
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