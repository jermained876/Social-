<template>
<div >

<div v-if="editing">

<edit-reply :ereply="reply" :qslug="qslug" :index="index"></edit-reply>

</div>


    <div v-else class="card mt-2">
        <div class="card-header">
            {{reply.user_name}} said
        </div>
        <div class="card-body">{{reply.reply}}</div>
        <div class="card-footer">{{reply.created_at}}</div>
    <p>likes {{reply.likecount}}</p>


<div v-if="own">
<div @click="editReply()" class="float-left"><ion-icon size="large" name="create"></ion-icon></div>
<div @click="deleteReply()" class="float-right"><ion-icon size="large"  name="trash"></ion-icon></div>

</div>



</div>




</div>
</template>

<script>
import User from '../../Helper/User'
import EditReply from './editReply'
export default {
    props:['reply','index','qslug'],
    components:{EditReply},
    data(){
        return{
            own:User.owner(this.reply.user_id),
            editing:false,
            beforeEditin:""
        }
    },

    methods:{
        deleteReply(){
            EventBus.$emit('deleteReply',this.reply,this.index)
        },
        editReply(){
            this.editing=true
            this.beforeEditin=this.reply.reply;
        }
    },
    watch: {
        reply(){


        }
    },
    created(){
        EventBus.$on('cancelReplyUpdate',()=>{this.editing=false
        this.reply.reply=this.beforeEditin
        })
    }}

}
</script>

<style>

</style>
