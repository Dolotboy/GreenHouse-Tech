<template>
    <div class="ProblemsWrapper">
        <div class="ProblemPlant">
            <p>Problèmes </p>  
            <div v-for='prob in plant.problems' class="ProblemInfo">
                <p>Problème: {{prob.problemName}} </p>
                <p>Type de problème: {{prob.problemType}} </p>
                <p>Solution: {{prob.problemSolution}}</p>
            </div> 
            <div class="close-button" @click="$emit('close')" >X</div> 
        </div>               
    </div>
</template>

<script>
export default {
  props : ['plant']
}
</script>

<style lang="scss">
.ProblemsWrapper{
    height: 50vh;
    width: 45%;
    position: absolute;
    top : 19%;
    left : 0%;
    background: white;
    border: solid;
    border-color: black;
}

/*.ProblemsWrapper{
    position :absolute;
    top : 50%;
    overflow-y: auto;
    transform: translate(-50%, -50%);
    background: white;
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
.ProblemPlant > p{
    font-size: 30px;
    margin:10px 0;
}   
.ProblemInfo > p{
    text-align: left;
    font-size: 15px;
    margin:10px 0;

}     
.ProblemPlant{
    display: flex;
    flex-direction: column;
}*/

</style>