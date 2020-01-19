<template>
 <div>
<h1>login</h1>


<div class="row">

<div class="col-md-6 offset-3">

  <form @submit.prevent="login()">
  <input type="email" name="" id="" class="form-control mt-2" placeholder="Email Address" v-model="form.email">   
<input type="password" name="" id="" class="form-control mt-2" placeholder="Password" v-model="form.password"> 
<input type="submit" class="btn btn-block btn-success mt-2" >
  
</form>


</div>


</div>
{{form}}


 </div>

</template>

<script>
export default {
  data(){
    return{
      form:{email:"",password:""}
    }
  },
  methods:{
    login(){
      axios.post('/api/auth/login',this.form).then((response)=>console.log(response.data)).catch((response)=>console.log(response));
    }
  }

}
</script>

<style>

</style>