<template>
<div class="container">
<h2>Create</h2>    

{{form}}
{{category}}
 <form action="#" @submit.prevent="create()">

     <div class="form-group">
        <label for="">Title</label>
        <input type="text " class="form-control" v-model="form.title">
        

    </div>

    <div class="form-group">
        <label for="">Body</label>
       
<!-- use v-model control value -->
    <vue-simplemde v-model="form.body" ref="markdownEditor" />
    </div>

    <div class="form-group">
  <label for="sel1">Category</label>
  <select class="form-control" id="sel1" v-model="form.category_id">
    <option v-for="cat in category" :key='cat.id' :value="cat.id">{{cat.name}} </option>
    
  </select>
</div>
 
    <button type="submit" class="btn btn-success">Submit</button>    
     
     </form>   
    
    
</div>  
</template>

<script>
export default {
    data(){
        return{
            form:{
                title:null,
                body:null,
                category_id:null,
            },
            category:{},
            errors:null
        }
    },
    methods:{
        create(){
            axios.post('api/question',this.form)
            .then((res)=>this.$router.push(res.data.data.path))
            .catch((error)=>this.errors=error.response.data.error);
        }
    },
    created(){
        axios.get('/api/category').then((res)=>this.category=res.data.data).catch();
       
    }

}
</script>

<style>

</style>