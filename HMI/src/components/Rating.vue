<template>
    <div class="difficultyRating">
        <h2>DIFFICULTÉ:</h2>
        <span v-for="i in difficulty" class="far fa-star checked"></span>
        <span v-for="i in 3 - difficulty" class="far fa-star"></span>
    </div>
</template>

<script>
export default {
    components :{
     },
    data(){
      return{
      }
  },
    props : ['difficulty'],
    mounted(){
        console.log(this.difficulty);
    },
    methods: {
        toggleCondFav(){
            this.showCondFav = !this.showCondFav;
        },
        toggleProblem(){
            this.showProblem = !this.showProblem;
        }
    } 
}
</script>

<style lang="scss">
.difficultyRating{
    display: flex;
    align-items: center;

    h2{
        margin-right : 3%;
    }

    .far{
        display : inline-block;
        width : 18px;
        height : 18px;
        margin-right : 5px;
        background : white;
        border: solid black;
        margin-right: 3%;
    }

    span{
        transform: rotate(45deg);
    }

    .checked{
        background : orange;
        color: orange;
    }

}
</style>