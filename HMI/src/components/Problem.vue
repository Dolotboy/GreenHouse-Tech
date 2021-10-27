<template>
    <div class="problem">
        <div class="problemPlant">
            <p>Problème : </p>             
        </div>
        <div class="close-button" @click="$emit('close')" >X</div>        
    </div>
</template>

<script>
export default {

}
</script>

<style>
.problem{
    position :absolute;
    top : 50%;
    left : 50%;
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
.problemPlant > p{
    font-size: 20px;
    text-align: left;
    margin:10px 0;
}    
.problemPlant{
    display: flex;
    flex-direction: column;
}
</style>