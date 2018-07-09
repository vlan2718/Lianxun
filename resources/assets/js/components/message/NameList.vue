<template>
    <div>
        <!--<select name="stateTagAdminLists" v-model="stateTagAdminListId">-->
        <!--<option v-for="(item ,index) in stateTagAdminLists" v-bind:value="item.id">{{item.name}}</option>-->
        <!--</select>-->

        <div v-for="item in Users_role_lists">
            <input type="checkbox"  :value="item.id" v-model="item.checked">{{item.name}}
        </div>

        <input type="button" @click="AddstateTag()" value="提交">
        <input type="button" @click="cloeMessage" value="取消">
    </div>
</template>

<script>
    export default {
        name: "namelist",
        props:['id','layerid'],
        data(){
            return{
                Users_role_lists:[],
            }
        },
        mounted(){

            if(this.id ==0){
                axios.get('/admin/message/getUserList/').then(response=>{
                    this.Users_role_lists=response.data
                });
            }else {
                axios.get('/admin/message/getUserList/'+this.id).then(response=>{
                    this.Users_role_lists=response.data
                });
            }
        },
        methods:{
            cloeMessage:function () {
                this.$layer.close(this.layerid);
            },
            AddstateTag:function () {
                this.$parent.Users=this.Users_role_lists;
                this.$layer.close(this.layerid);
            },

        }
    }
</script>

<style scoped>

</style>