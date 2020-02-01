<template>
  <div class="container">
    <h2>Edit</h2>

<form action="#" @submit.prevent="update()">

     <div class="form-group">
        <label for="">Title</label>
        <input type="text " class="form-control" v-model="form.title">
        

    </div>

    <div class="form-group">
        <label for="">Body</label>
       
<!-- use v-model control value -->
    <vue-simplemde v-model="form.body" ref="markdownEditor" />
    </div>

   
 
    <button type="submit" class="btn btn-success">Update</button>    
     <button @click="cancel" class="btn btn-warning">Cancel</button>
     </form>   



  </div>
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
            form:{title:null,
                    body:null
                }
        }

    },
    methods:{
        update() {
            axios.patch('/api/question/'+this.form.slug,this.form)
            .then((res)=>this.cancel(),
            console.log('ehate'))
            .catch((error)=>console.log(error.response.data))
        },
        cancel(){
            EventBus.$emit('cancelEditing')
        }

    },

    mounted(){
        this.form=this.data
    }

}
</script>

<style>

</style>