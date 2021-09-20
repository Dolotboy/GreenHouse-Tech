<template>
    <div class="details">
        <h1>Details component : {{ plant.plantName }}</h1>
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
</style>