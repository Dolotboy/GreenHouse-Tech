<template>
    <div class="ProblemsWrapper">
        <div class="ProblemPlant">
            <h1>{{ $t("message.problems") }}</h1>  
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
@media screen and (min-width : 601px) 
  {
.ProblemsWrapper{
    height: auto;
    max-height: 80vh;
    position: absolute;
    top : -10%;
    left :10%;
    background: gray;
    border: solid;
    border-color: black;
    width : 32vw;
    padding-left: 5%;
    padding-right: 5%;
    overflow-y: auto;
}
  }
@media screen and (max-width : 600px) 
  {
      .ProblemsWrapper
      {
        height: auto;
        max-height: 80vh;
        position: absolute;
        top : 10%;
        left :30%;
        background: gray;
        border: solid;
        border-color: black;
        width : 50vw;
        padding-left: 5%;
        padding-right: 5%;
        overflow-y: auto;

      }
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
</style>