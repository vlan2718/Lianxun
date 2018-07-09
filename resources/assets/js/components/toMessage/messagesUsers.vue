<template>
    <div>

        <div> <label for="important">是否重要</label><input type="checkbox" id="important" name="important" value="1" v-model="important"/></div>
        <div> <label for="message_Text">消息内容</label><input type="text" id="message_Text" name="message_Text" v-model="message_Text"/></div>
        <input type="button" @click="message" value="提交">
        <input type="button" @click="cloeMessage" value="取消">
    </div>
</template>

<script>
    export default {
        name: "message",
        props:['layerid'],
        data(){
            return{
                important:[],
                message_Text:[]
            }
        },
        methods:{
            message:function () {
                axios.post('/admin/member/tomessageUserIds', {

                    important:this.important,
                    message_Text:this.message_Text,
                }).then(response=>{
                    this.$layer.close(this.layerid);
                }).catch(function (error) {
                    alert(error);
                });
            },
            cloeMessage:function () {
                this.$layer.close(this.layerid);
            }
        }
    }
</script>

<style scoped>

</style>