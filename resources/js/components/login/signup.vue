<template>
 <div>
<h1>Sign Up</h1>


<div class="row">

<div class="col-md-6 offset-3">

  <form @submit.prevent="signup()">
 <input type="text" name="" id="" class="form-control mt-2" placeholder="Name" v-model="form.name">   
 <p class="text-danger" v-if="errors.name">{{errors.name[0]}}</p>
 <input type="email" name="" id="" class="form-control mt-2" placeholder="Email Address" v-model="form.email">   
 <p class="text-danger" v-if="errors.email">{{errors.email[0]}}</p>
 <input type="password" name="" id="" class="form-control mt-2" placeholder="Password" v-model="form.password"> 
 <p class="text-danger" v-if="errors.password">{{errors.password[0]}}</p>
 <input type="password" name="" id="" class="form-control mt-2" placeholder="Confirm Password" v-model="form.password_confirmation"> 
  <router-link to="/login1">
  <button class="btn btn-success mt-3">Login</button>
  </router-link>
  
  <button type="submit" class="btn btn-primary mt-3">signup</button>
  
  
</form>


</div>


</div>
{{form}}
{{errors}}


 </div>

</template>

<script>
import User from '../../Helper/User';
export default {
  data(){
    return{
      form:{name:null,email:null,password:null,password_confirmation:null},
      errors:{}
    }
  },
  methods:{
    signup(){
      
        axios.post('/api/auth/signup',this.form).then(res=>{
        
        User.afterLogin(res.data);
        console.log('signup');
        this.$router.push({name:'forum'});
        
        
        })
        .catch((errors)=>this.errors=errors.response.data.errors);
    }
  },
  created()
  {
    if(User.loggedIn())
    {
      this.$router.push({name:'forum'})
    }
  }

}
</script>

<style>

</style>