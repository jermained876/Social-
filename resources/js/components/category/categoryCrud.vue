<template>
  <div class="container">
      <h2>Categories</h2>

      <form action="#" @submit.prevent="createCategory" class="mt-3">
        <div class="form-group">
          <label for="Name"></label>
          <input type="text" class="form-control" v-model="category.name">
        </div>

         <div v-if="editing"> 
          <button type="submit" class="btn btn-info">Update</button>
          <button @click="cancelEdit()" class="btn btn-warning">Cancel</button>
        </div>
        <div v-else> 
          <button type="submit" class="btn btn-success">Create</button>
        </div>
      
      </form>

<ul class="list-group mt-2" >
  <li class="list-group-item " v-for="(cat,index) in categories" :key="cat.id"><div @click="editCat(cat,index)" class="float-left mr-2"><ion-icon name="create"></ion-icon></div>{{cat.name}} <div  @click="delCat(cat,index)" class="float-right"><ion-icon name="trash"></ion-icon></div></li>
 
</ul>


  </div>
</template>

<script>
export default {

data(){
  return{
    category:{name:null,
              slug:null,
              index:null},
    categories:[],
    editing:false
  }
},
methods:{
  createCategory(){
    if(this.editing)
    {
      axios.patch('/api/category/'+this.category.slug,this.category)
      .then((res)=>{this.categories[this.category.index].name=res.data.data.name
      this.cancelEdit()
      })
      .catch((error)=>console.log(error))
    }
    else{

    axios.post('/api/category',this.category)
    .then((res)=>{this.categories.unshift(res.data.data)
    this.category.name=""})
    .catch((error)=>console.log(error.response.data))
    }
  },
  editCat(cat,index){
    console.log(index);
    this.editing=true;
    this.category.name=cat.name
    this.category.slug=cat.slug
    this.category.index=index
  },
  delCat(cat,index){
    console.log(cat);
    axios.delete('/api/category/'+cat.slug)
    .then((res)=>this.categories.splice(index,1))
    .catch((error)=>console.log(error.response.data))
  },
  cancelEdit(){
      this.editing=false;
      this.category.name=null
      this.category.slug=null
      this.category.index=null
  }
},
created()
{
  if(!User.admin())
  {
    this.$router.push('/forum')
  }

  axios.get('/api/category')
  .then((res)=>this.categories=res.data.data)
  .catch((error)=>console.log(error.response.data))
}


}
</script>

<style>

</style>