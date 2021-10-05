<template>
<div class="wrapper">
  <h1>{{ plant.plantName }}</h1>
  <p>{{ plant.idPlant }}</p>
</div>
</template>

<script>
export default {
    props : ['plant']
}
</script>

<style>
.wrapper{
    border : solid 1px black;
}
</style>