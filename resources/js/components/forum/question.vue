<template>

<div class="card">
  
  <div class="card-body">
<router-link :to="data.path">

    <h5 class="card-title">{{data.title}}</h5>
</router-link>

    
    <p class="card-text">{{data.created_at}}</p>
    <p>{{data.user}}</p>
  </div>
</div>
  
</template>

<script>
export default {
    props:['data']

}
</script>

<style>

</style>