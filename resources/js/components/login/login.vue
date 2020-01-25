<template>
 <div>
<h1>login</h1>


<div class="row">

<div class="col-md-6 offset-3">

  <form @submit.prevent="login()">
  <input type="email" name="" id="" class="form-control mt-2" placeholder="Email Address" v-model="form.email">   
<input type="password" name="" id="" class="form-control mt-2" placeholder="Password" v-model="form.password"> 
<button type="submit" class="btn btn-success mt-3">Login</button>
 <router-link to="/signup">
  <button class="btn btn-primary mt-3">Signup</button>
  </router-link>
  
</form>


</div>


</div>
{{form}}


 </div>

</template>

<script>
import User from "../../Helper/User"
export default {
  data(){
    return{
      form:{email:"cruickshank.frank@example.com",password:"password"}
    }
  },
  methods:{
    login(){
      
    User.login(this.form)
    
    this.$router.push({name:'forum'})
    }
  },
created(){
  if(User.loggedIn())
  {
    this.$router.push({name:'forum'})
  }
}
}
</script>

<style>

</style>