<template>

    <div id="adminbody">
        <form  v-on:submit.prevent="updateUserInfo(User)">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr>
                    <td width="21%" align="center" bgcolor="#f0f0f0">&nbsp;</td>
                    <td width="9%" align="right" bgcolor="#f0f0f0">&nbsp;</td>
                    <td colspan="3" bgcolor="#f0f0f0">&nbsp;</td>
                    <td width="22%" bgcolor="#f0f0f0">&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="5" align="center"><div style="width:140px;height:140px; border-radius:100px; background:#CCC;">
                        <img v-bind:src="User.head_img" style="width:140px;height:140px; border-radius:100px;"/>
                    </div> </td>
                    <td align="right">会员状态</td>
                    <td>
                        <select name="user_status" v-model="User.user_status" >
                            <option v-for="(item ,index) in category" v-bind:value="item.value">{{item.name}}</option>
                    </select>
                    </td>
                    <td align="right">会员等 级 </td>
                    <td><select name="level" v-model="User.level_id">
                        <option v-for="(item ,index) in levels" v-bind:value="item.id">{{item.level_name}}</option>
                    </select></td>
                    <td rowspan="5" align="center"><p>&nbsp;</p></td>
                </tr>
                <tr>
                    <td align="right">手机账号</td>
                    <td><input name="mobile" type="text" v-model="User.mobile"></td>
                    <td align="right">密码</td>
                    <td><input name="password" type="text" v-model="User.password"></td>
                </tr>
                <tr>
                    <td align="right">会员姓名</td>
                    <td width="15%"><input type="text" v-model="User.name" name="name"></td>
                    <td width="10%" align="right">昵称</td>
                    <td width="23%"><input type="text" name="nickname" v-model="User.nickname"></td>
                </tr>
                <tr>
                    <td align="right">性别</td>
                    <td><input type="radio" name="gender" v-model="User.gender" value="1" v-bind:value="1">
                        男
                        <input type="radio" name="gender" v-model="User.gender" value="0" v-bind:value="0">
                        女</td>
                    <td align="right">注册时间</td>
                    <td><input type="text" name="created_at" v-model="User.created_at"></td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">上传头像：
                        <input type="file" name="image" style="width:120px;"   @change="onFileChange" ></td>
                    <td align="right">用户描述</td>
                    <td colspan="3"><textarea name="description" style="width:100%; height:100px" v-model="User.description"></textarea></td>
                    <td align="center" valign="top">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center">&nbsp;</td>
                    <td align="right">&nbsp;</td>
                    <td colspan="3"><input type="submit" name="Submit" value="保存用户信息"></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "infoadminbody",

        mounted() {
            axios.get('/admin/member/getUserById?id='+this.$route.params.id).then(response=>{

                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }else {
                    this.User=response.data;
                    this.old_level_id=response.data.level_id;

                }

            }).catch(function (error) {
                alert(error);
            });
            axios.get('/admin/member/getLavelList').then(response=>{
                this.levels=response.data
            })
        }, data(){
            return {
                User:[],
                levels:[],
                image:[],
                old_level_id:[],
                category:[
                    {name:'未激活',id:1 ,value:1},
                    {name:'已激活',id:2,value:2},
                    {name:'暂停中',id:3,value:3},
                    {name:'已停用',id:4,value:4}
                ],
            }
        },methods:{
            updateUserInfo:function (User) {


                axios.post('/admin/member/updateUserInfo', {
                    id:this.$route.params.id,
                    level_id:User.level_id,
                    old_level_id:this.old_level_id,
                    mobile:User.mobile,
                    images:this.image,
                    user_status:User.user_status,
                    name:User.name,
                    nickname:User.nickname,
                    gender:User.gender,
                    created_at:User.created_at,
                    description:User.description,
                }).then(response=> {
                  alert("数据保存成功");
                    this.$router.push({path:'/admin/member/Admin'});
                }).catch(function (error) {
                    alert(error);
                });

            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            }

        }

    }

</script>

<style scoped>

</style>