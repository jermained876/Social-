<template>
  <div class="card mt-5">
    {{data}}
    {{owner}}
  <h5 class="card-header">{{data.title}}</h5>
  <div class="card-body">
    <p>{{data.body}}</p>
    <p class="card-title">{{data.user}}</p>
    <p class="card-text">{{data.created_at}}</p>
    <div  v-show="owner" >

<div @click="edit()"> <ion-icon name="create"></ion-icon></div>
<div @click="del()"><ion-icon  name="trash"></ion-icon></div>

    </div>
    
  </div>
</div>

</template>

<script>
import User from '../../Helper/User'
export default {
props:['data'],
data(){
  return{
    owner:null,
  }
},
methods:{

del(){
axios.delete('/api/question/'+this.data.slug)
.then((res)=>this.$router.push('/forum'))
.catch((error)=>console.log(error.response.data))
},
edit(){
  console.log('test');
  EventBus.$emit('editQuestion')
}

},
watch:{
data(){
  this.owner = User.owner(this.data.created_id);
}
},
created(){
  //console.log(User.owner(this.data.created_id));
  //console.log(data)
  },
  mounted(){
    //console.log(this.data)
  }
}
</script>

<style>

</style>