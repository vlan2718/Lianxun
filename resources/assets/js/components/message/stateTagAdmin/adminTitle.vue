<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td align="center">ID</td>
                    <td align="center">状态标签</td>
                    <td align="center">名下系统发布</td>
                    <td align="center">修改</td>
                    <td align="center">删除</td>
                </tr>
                <tr v-for="(stateTagList,index) in stateTagLists" :key="stateTagLists.id">
                    <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                    <td align="center">{{stateTagList.id}}</td>
                    <td align="center">{{stateTagList.name}}</td>
                    <td align="center"><a href="">名下此标签文章</a></td>
                    <td align="center" @click="updatestateTagList(stateTagList)">修改</td>
                    <td align="center" @click="deleteTodo(stateTagList,index)">删除</td>
                </tr>
            </table>
        </form>
        <updateNews :stateTagListsId="stateTagListsId" :stateTagLists="stateTagLists"></updateNews>
    </div>

</template>

<script>
    import updateNews from './updateNews'

    export default {
        name: "adminTitle",
        components:{
            updateNews
        },mounted() {
            axios.get('/admin/message/stateTagAdminList/').then(response=>{
                this.stateTagLists=response.data
            })
        },data(){
            return {
                stateTagLists:[],
                stateTagListsId:[]
            }
        },methods: {
            updatestateTagList: function (stateTagList) {
                this.stateTagListsId = stateTagList
            },
            deleteTodo(stateTagList,index){
                var r=confirm("确定要删除？");
                if (r==true)
                {
                axios.post('/admin/message/deleteStateTagList', {
                    id:stateTagList.id,
                }).then(function (response) {

                }).catch(function (error) {
                    alert(error);
                });
                this.stateTagLists.splice(index,1);
                alert("已删除");
            }else
                {
                    alert("已取消删除");
    }

            }
        }
    }
</script>

<style scoped>

</style>