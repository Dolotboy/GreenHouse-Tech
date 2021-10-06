<template>
<div class="wrapper">
  <h1>{{ plant.plantName }}</h1>
  <p>{{ plant.idPlant }}</p>
  <input class="star" type="checkbox" title="favorite"> 
</div>
</template>

<script>
export default {
    props : ['plant']
}
</script>

<style>
.wrapper{
    position: relative;
    border : solid 1px black;
}
.star {
    top: 5px;
    right: 50px;
    position: absolute;
    visibility:hidden;
    font-size:40px;
    cursor:pointer;
    color: white;
}
.star:before {
   content: "\2606";
   position: absolute;
   visibility:visible;
}
.star:hover{
  color: gold;
  content: "\2605";
}
.star:checked:before {
   content: "\2605";
   position: absolute;
   color: gold;
}
</style>