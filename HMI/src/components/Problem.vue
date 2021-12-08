<template>
    <div class="ProblemsWrapper">
        <div class="ProblemPlant">
<<<<<<< HEAD
            <p>{{ $t("message.problems") }}</p>  
=======
            <h1>Problèmes </h1>  
>>>>>>> request#121
            <div v-for='prob in plant.problems' class="ProblemInfo">
                <p>{{ $t("message.problem") }}{{prob.problemName}} </p>
                <p>{{ $t("message.problemType") }}{{prob.problemType}} </p>
                <p>{{ $t("message.solution") }}{{prob.problemSolution}}</p>
            </div> 
            <div class="close-button" @click="$emit('close')" >X</div> 
        </div>               
    </div>
</template>

<script scoped>
export default {
  props : ['plant']
}
</script>

<style lang="scss" scoped>
.ProblemsWrapper{
    height: auto;
    position: absolute;
    top : -10%;
    left :10%;
    background: white;
    border: solid;
    border-color: black;
    width : 32vw;
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
.ProblemPlant h1{
    font-size: 1.2rem;
    text-decoration: underline;
}
.ProblemInfo > p{
    font-size: 1.2rem;
    text-align: left;
    margin:10px 0;
    font-weight: bold;
}     
.ProblemPlant{
    display: flex;
    flex-direction: column;
}

/*.ProblemsWrapper{
    position :absolute;
    background-color:rgb(82, 82, 82);
    top : 50%;
    overflow-y: auto;
    transform: translate(-50%, -50%);
<<<<<<< HEAD
=======
    background: white;
>>>>>>> request#121
    border: solid;
    border-color: black;
    width : 70vw;
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
<<<<<<< HEAD
    overflow-y:auto;
}
=======
}*/
>>>>>>> request#121

</style>