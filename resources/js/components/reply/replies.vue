<template>
  <div >
   <div class="card mt-2">
     <div class="card-header"><h3>Replies</h3></div>
     <div class="card-body">
       
      <reply v-for=" (data,index) in datas" :key="data.id" :reply="data" :qslug="qslug" :index="index"></reply>

     </div>
   </div>
    
    
    <create-reply :qslug="qslug"></create-reply>

  </div>
</template>

<script>
import CreateReply from './createReply.vue'
import Reply from './reply.vue'
export default {
  components:{Reply,CreateReply},

   props:['replies','qslug'],
   data(){
     return{
       datas:null
     }
   },
   watch:{
     replies(){
       this.datas=this.replies;
     }
   },
   created(){
     EventBus.$on('createdReply',(res)=>this.datas.unshift(res))


  EventBus.$on('editedReply',(res,index)=>{this.datas[index].reply=res.reply
  EventBus.$emit('cancelReplyUpdate')
  })



      EventBus.$on('deleteReply',(reply,index)=>
        axios.delete('/api/question/'+this.qslug+'/reply/'+reply.id)
        .then((res)=>this.datas.splice(index,1))
        .catch((error)=>console.log(error.response.data))
      )
   }

}
</script>

<style>

</style>