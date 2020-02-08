<template>
  <div class="card mt-5">
   
  <h5 class="card-header">{{data.title}}</h5>
  <div class="card-body">
    <p>{{data.body}}</p>
    <p class="card-title">{{data.user}}</p>
    <p class="card-text">{{data.created_at}}</p>
    <div  v-show="owner" >

<div class="float-left" @click="edit()"> <ion-icon size="large"  name="create"></ion-icon></div>
<div class="float-right" @click="del()"><ion-icon size="large" name="trash"></ion-icon></div>

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