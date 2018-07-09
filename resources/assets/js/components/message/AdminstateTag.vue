<template>
    <div>
        <!--<select name="stateTagAdminLists" v-model="stateTagAdminListId">-->
            <!--<option v-for="(item ,index) in stateTagAdminLists" v-bind:value="item.id">{{item.name}}</option>-->
        <!--</select>-->

        <div v-for="item in stateTagAdminLists">
            <input type="checkbox"  :value="item.id" v-model="item.checked">{{item.name}}
        </div>

        <input type="button" @click="AddstateTag()" value="提交">
        <input type="button" @click="cloeMessage" value="取消">
    </div>
</template>

<script>
    export default {
        name: "stateTag",
        props:['NewAdminID','layerid'],
        data(){
            return{
                stateTagAdminLists:[],
                stateTagAdminListId:[],
            }
        },
        mounted(){
            axios.get('/admin/message/tagAdminListOk/'+this.NewAdminID).then(response=>{
                this.stateTagAdminLists=response.data
            });

        },
        methods:{
            cloeMessage:function () {
                this.$layer.close(this.layerid);
            },
            AddstateTag:function () {
                axios.post('/admin/message/add_Admin_new_tab', {
                     u_newsId:this.NewAdminID,
                    stateTagAdminLists: this.stateTagAdminLists,
                }).then(response=>{
                    this.$layer.close(this.layerid);
                }).catch(function (error) {
                    alert(error);
                });
            },

        }
    }
</script>

<style scoped>

</style>