<template>


   <div class="wrapper">

  <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Always expand</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          

            <li class="nav-item active" v-for='item in items'>
             <a class="nav-link" href="" v-show="item.show"><router-link :to="item.to">{{item.title}}</router-link></a>
            
          </li>

          
        </ul>
        
      </div>
    </nav>
{{items}}

       <h1>Home</h1>
       <router-view></router-view>
       

   </div>


    
</template>


<script>
import Login from "./components/login/login.vue"
import User from "./Helper/User"
    export default {
        components:{Login},
        data(){
          return {
            items:[
              {title:'Forum',to:"/forum",show:true},
              {title:'Ask Question',to:"/ask",show:User.loggedIn()},
              {title:'Categories',to:"/category",show:User.loggedIn()},
              
              {title:'login',to:"/login1",show:!User.loggedIn()},
              {title:'logOutq',to:"/logout",show:User.loggedIn()}
            ]
          }
        },
        mounted() {
            console.log('Component mounted.')
            console.log(User.loggedIn())
            
        },
        created(){
            EventBus.$on('logout',()=>{
              User.loggedOut()
            });
        }
    }
</script>