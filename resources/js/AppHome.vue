<template>


   <div class="wrapper">

  <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Always expand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
              <li class="nav-item active">
             <a class="nav-link" href=""><router-link to="/login1">Login</router-link></a>
            
          </li>
        </ul>
        
      </div>
    </nav>


       <h1>Home</h1>
       <router-view></router-view>
       

   </div>


    
</template>


<script>
import Login from "./components/login/login.vue"
    export default {
        components:{Login},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>