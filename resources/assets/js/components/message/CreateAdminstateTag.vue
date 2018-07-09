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
        name: "createstateTag",
        props:['tag','layerid'],
        data(){
            return{
                stateTagAdminLists:[],
                stateTagAdminListId:[],
            }
        },
        mounted(){
            axios.get('/admin/message/CreatetagAdminListOk/').then(response=>{
                this.stateTagAdminLists=response.data
            });

        },
        methods:{
            cloeMessage:function () {
                this.$layer.close(this.layerid);
            },
            AddstateTag:function () {
                this.$parent.Tag=this.stateTagAdminLists;
                this.$layer.close(this.layerid);
            },

        }
    }
</script>

<style scoped>

</style>