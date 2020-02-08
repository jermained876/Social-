<template>
<div>

{{data}}  
<vue-simplemde v-model="form.body" ref="markdownEditor" />
<button @click="updateReply()" class="btn btn-success">Add</button>
<button @click="cancelUpdate()" class="btn btn-warning">Cancel </button>

</div>



</template>

<script>
export default {
    props:['ereply','qslug','index'],
    data(){
        return{
            form:{
                body:''
            }
        }
    },
    methods:{
        updateReply(){

            console.log('here');
            axios.patch('/api/question/'+this.qslug+'/reply/'+this.ereply.id,this.form)
            .then((res)=>
           EventBus.$emit('editedReply',res.data,this.index)
           // console.log(res)
            )
            .catch((error)=>console.log(error.response.data))
        

        },
        cancelUpdate(){
            console.log('here');
            EventBus.$emit('cancelReplyUpdate')
        }
    },
    watch:{
        ereply(){
          
        }
    },
    created()
    {
          this.form.body=this.ereply.reply
    }

}
</script>

<style>

</style>