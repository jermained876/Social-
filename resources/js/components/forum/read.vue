<template>
<div class="container">
<edit-question v-if="editing" :data='question'></edit-question>
<show-question v-else :data='question'></show-question>

</div>


  
</template>

<script>
import ShowQuestion from './showQuestion.vue'
import EditQuestion from './editQuestion.vue'

export default {
    components:{ShowQuestion,EditQuestion},
    data(){
return{
    question:{},
    editing:false
}
    },

    methods:{
        getQuestion()
        {
            axios.get('/api/question/'+this.$route.params.slug)
            .then((res)=>this.question=res.data.data)
            .catch((errors)=>console.log(errors));
        },
        listen(){
            EventBus.$on('editQuestion',()=>this.editing=true);
            EventBus.$on('cancelEditing',()=>this.editing=false);
        }

    },
created(){
this.listen();
this.getQuestion();



}


}
</script>

<style>

</style>