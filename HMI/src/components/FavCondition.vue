<template>
    <div class="FavConds">
        <div class="FavCondPlant">
            <p>{{ $t("message.favCond") }}</p>  
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

<style>
.FavConds{
    position :absolute;
    top : 50%;
    left : 50%;
    overflow-y: auto;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 50vw;
    padding-left: 5%;
    padding-right: 5%;
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
    border-color: grey;
}
.details h1{
    font-size: 35px;
}
.FavCondPlant > p{
    font-size: 30px;
    margin:10px 0;
}   
.FavCondPlantInfo > p{
    font-size: 15px;
    text-align: left;
    margin:10px 0;

}     
.FavCondPlant{
    display: flex;
    flex-direction: column;
    overflow-y:auto;
}

</style>