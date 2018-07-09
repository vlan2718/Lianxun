<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
                    <td align="center">ID</td>
                    <td align="center">管理员角色</td>
                    <td align="center">成员</td>
                    <td align="center">角色默认权限设置</td>
                    <td align="center">修改</td>
                    <td align="center">删除</td>
                </tr>
                <tr v-for="(ManageFunSetList,index) in ManageFunSetLists" :key="ManageFunSetLists.id">
                    <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td align="center">{{ManageFunSetList.id}}</td>
                    <td align="center">{{ManageFunSetList.name}}</td>
                    <td align="center"><router-link :to="'/admin/system/ManageFunSets/'+ManageFunSetList.id" tag="a">{{ManageFunSetList.user_count}}个</router-link></td>
                    <td align="center"><router-link :to="'/admin/system/ManageFunSetOk/'+ManageFunSetList.id" tag="a">默认权限</router-link></td>
                    <td align="center" @click="updateLevel(ManageFunSetList)">修改</td>
                    <td align="center" @click="deleteTodo(ManageFunSetList,index)">删除</td>
                </tr>
            </table>
        </form>

        <div style="width:45%;margin:auto;margin-top:20px;">
            <form v-on:submit.prevent="createLevel(ManageFunSetListId)">
                <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                    <tr>
                        <td width="17%" align="right">角色名称</td>
                        <td width="32%"><input type="text" name="name" v-model="ManageFunSetListId.name"></td>
                        <td width="10%"><input type="submit" name="Submit" value="添加"></td>
                        <td width="41%">点击需要修改的角色，此处可置为修改</td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
</template>

<script>
    export default {
        name: "adminbody",
        data(){
            return {
                ManageFunSetLists:[],
                ManageFunSetListId:[]
            }
        },
        mounted() {
            axios.get('/admin/system/getManageFunSetList').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }
                this.ManageFunSetLists=response.data
            });
        },methods:{
            updateLevel:function (ManageFunSetList) {
                this.ManageFunSetListId=ManageFunSetList
            },
            createLevel:function (ManageFunSetListId) {
                if (ManageFunSetListId.id){
                    axios.post('/admin/system/updateManageFunSetListId', {
                        id:ManageFunSetListId.id,
                        name:ManageFunSetListId.name,
                    }).then(response=>{
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            ManageFunSetListId.id = response.data;
                        }
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/system/createManageFunSetListId', {
                        name:ManageFunSetListId.name,
                        parent_id:0
                    }).then(response=> {
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            this.ManageFunSetLists.push(ManageFunSetListId);
                            ManageFunSetListId.id = response.data;

                        }

                    }).catch(function (error) {
                        alert(error);
                    });

                }
            },
            deleteTodo(ManageFunSetList,index){
                var r=confirm("确定要删除？");
                if (r==true)
                {
                    axios.post('/admin/system/deleteManageFunSetListId', {
                        id:ManageFunSetList.id,
                    }).then(response=>{
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            this.ManageFunSetLists.splice(index,1);
                        }
                    }).catch(function (error) {
                        alert(error);
                    });

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