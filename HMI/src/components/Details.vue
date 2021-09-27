<template>
    <div class="details">
        <h1>{{ plant.plantName }}</h1>
        <div class="detailsPlant">
            <p>Type de plante : {{ plant.plantType }}</p>
            <p>Saison : {{plant.season}}</p>
            <p>Problème : </p>
            <p>Condition favorable : </p>
            <p>Date de semance : </p>
            <p>Date de récolte :</p>
            <p>Temps de conservation : {{plant.daysConservation}} jour(s)</p>
            <p>Distance de plants : </p>
            <p>Type de sol : {{plant.groundType}}</p>
            <p>Fonctionnement : {{plant.description}}</p>              
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
.details{
    position : absolute;
    top : 50%;
    left : 50%;
    transform: translate(-50%, -50%);
    background: rgb(206, 205, 205);
    border: solid;
    border-color: black;
    width : 50vw;
    height: 85vh;
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
.detailsPlant > p{
    font-size: 24px;
    margin-top: 1.5%;
    text-align: left;
    text-align: justify;
}
.detailsPlant{
    display: flex;
    flex-direction: column;
}
</style>