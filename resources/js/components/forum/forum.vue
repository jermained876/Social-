<template>
<div class="container">

<div class="row">

<div class="col-md-8" ><h3>Questions</h3>

<question v-for="question in questions" :key="question.path" :data="question"></question>

</div>
<div class="col-md-4"><h3>Sidebar</h3>

<fcategory></fcategory>
</div>





</div>


</div>
</template>

<script>
import question from './question'
import fcategory from './forumCategory.vue'
export default {
    components:{question,fcategory}, 
    data(){
   return{
       questions:{}
   }
    },
    mounted(){
        axios.get('/api/question').then((res)=>this.questions=res.data.data)
        .catch((errors)=>console.log(errors));

    }

}
</script>

<style>

</style>