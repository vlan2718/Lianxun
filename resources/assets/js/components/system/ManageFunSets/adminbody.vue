<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader" >
                    <td align="center"><input type="checkbox" name="checkbox4" value="checkbox"></td>
                    <td align="center">ID</td>
                    <td align="center">角色</td>
                    <td align="center">成员</td>
                    <td align="center">账户名</td>
                    <td align="center">密码</td>
                    <td align="center">修改</td>

                </tr>
                <tr v-for="(user,index) in users" :key="users.id" >
                    <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td align="center">{{user.id}}</td>
                    <td align="center">{{user.role_name}}</td>
                    <td align="center">{{user.username}}</td>
                    <td align="center">{{user.username}}</td>
                    <td align="center">{{user.password}}</td>
                    <td align="center" @click="updateLevel(user)">修改</td>

                </tr>

            </table>
        </form>
        <div style="width:60%;margin:auto;margin-top:20px;">
            <form v-on:submit.prevent="updateUserInfo(userId)">
                <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                    <tr>
                        <td align="right">角色</td>
                        <td>
                            <select name="role_id" v-model="userId.role_id">
                            <option v-for="(item ,index) in roles" v-bind:value="item.id">{{item.name}}</option>

                        </select>
                        </td>
                        <td align="right">成员</td>
                        <td><input name="username" type="text" size="10" v-model="userId.username"></td>
                        <td align="right">登录账户</td>
                        <td><input type="text" name="username1" v-model="userId.username"></td>
                        <td>密码</td>
                        <td><input type="text" name="password" v-model="userId.password"></td>
                        <td><input type="submit" name="Submit" value="添加"></td>
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
                users:[],
                userId:[],
                roles:[]
            }
        },
        mounted() {
            axios.get('/admin/system/ManageFunSetsLists/'+this.$route.params.id).then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }
                this.users=response.data
            });
            axios.get('/admin/system/getManageFunSetList').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }
                this.roles=response.data
            });
        },
        methods:{
            updateLevel:function (user) {
                this.userId=user
            },
            updateUserInfo:function (userId) {
                axios.post('/admin/system/updateManageFunSetsLists', {
                    username:userId.username,
                    id:userId.id,
                    role_id:userId.role_id,
                    password:userId.password,
                }).then(response=> {
                    if (response.data == 0) {
                        this.$router.push({path: '/admin/role_error/'});
                    } else {
                        userId.id = response.data;
                    }
                        }).catch(function (error) {
                    alert(error);
                });
            }
        }
    }







</script>

<style scoped>

</style>