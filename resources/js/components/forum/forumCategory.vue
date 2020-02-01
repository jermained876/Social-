<template>
 <div class="container">
<div class="card">
<div class="card-header bg-primary text-uppercase t">Catergories</div>

<ul class="list-group mt-2" >
  <li class="list-group-item" v-for="cat in categories" :key="cat.id"> {{cat.name}}</li>
 
</ul>

</div>


</div> 
</template>

<script>
export default {
    data(){
        return{
            categories:{}
        }
    },
created(){
    axios.get('/api/category')
    .then((res)=>this.categories=res.data.data)
    .catch((error)=>console.log(error.reponse.data))
}
}
</script>

<style>

</style>