<template>
    <div class="FavConds">
        <div class="FavCondPlant">
<<<<<<< HEAD
            <p>{{ $t("message.favCond") }}</p>  
=======
            <h1>Conditions favorables </h1>  
>>>>>>> request#121
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

<<<<<<< HEAD
<style scoped>
=======
<style lan="scss" scoped>
>>>>>>> request#121
.FavConds{
    position :absolute;
    top : -10%;
    left: -75%;
    overflow-y: auto;
<<<<<<< HEAD
    transform: translate(-50%, -50%);
    background: rgb(100, 100, 100);
    border: solid;
    border-color: black;
    width : 80vw;
=======
    background: white;
    border: solid;
    border-color: black;
    width : 28vw;
>>>>>>> request#121
    padding-left: 5%;
    padding-right: 5%;
    overflow-y: auto;
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