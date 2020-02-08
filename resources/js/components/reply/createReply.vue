<template>
<div>
<h3>Add reply</h3>
{{qslug}}

<vue-simplemde v-model="body" ref="markdownEditor" />
<button @click="createReply" class="btn btn-success">Add</button>

</div>

</template>

<script>
export default {
    props:['qslug'],
    data(){
        return{
            body:null
        }
    },
    methods:{
        createReply(){
            console.log(this.qslug);
            axios.post('/api/question/'+this.qslug+'/reply',{body:this.body})
            .then((res)=> {
                this.body=""
                EventBus.$emit('createdReply',res.data.data)})
                .catch((error)=>console.log(error.response.data))
        }
    }

}
</script>

<style>

</style>