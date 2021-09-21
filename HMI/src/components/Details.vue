<template>
    <div class="details">
        <h1>Details component : {{ plant.plantName }}</h1>
        <p>Type de plante : {{ plant.plantType }}<br/>
           Saison : {{plant.season}}<br/>
           Problème : <br/> 
           Condition favorable : <br/>
           Date de semance : <br/>
           Date de récolte : <br/>
           Temps de conservation : {{plant.daysConservation}}<br/>
           Distance de plants : <br/>
           Fonctionnement : 
        </p>
        <div class="close-button" @click="$emit('close')" >X</div>        
    </div>
</template>

<script>
export default {
    props : ['plant']
}
</script>

<style>
.details{
    position : absolute;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(221, 140, 140);
    width : 50vw;
    height: 50vh;
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
</style>