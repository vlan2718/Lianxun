<template>
    <div id="adminbody">
        <div style="width:25%; float:left; height:400px;">
            <div style="width:200px; height:400px; margin:auto;padding:30px;">
                <div style="width:120px; height:120px; background:#CCC; border-radius:100px;"></div>
                <div style="margin-top:30px;font-size:14px;line-height:40px;">
                    <div>角色：系统超管</div>
                    <div>成员：Admin</div>
                    <div>账号：Admin</div>
                    <div>密码：Admin888</div>
                </div>
            </div>
        </div>
        <div style="float:left; width:60%;margin-top:30px;">
            <form v-on:submit.prevent="createRole(roleIds)">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                    <tr class="tableHeader">
                        <td width="4%" bgcolor="#e0e0e0"><input type="checkbox" name="checkbox" value="checkbox"></td>
                        <td width="18%" bgcolor="#e0e0e0">会员管理</td>
                        <td width="78%" bgcolor="#e0e0e0">&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox2" value="checkbox"></td>
                        <td>会员等级设置</td>
                        <td><input type="checkbox" name="checkbox223" v-model="roleIds.MemberLavel" value="1">
                            查看　
                            <input type="checkbox" name="checkbox22" v-model="roleIds.createLevel" value="2">
                            新增　
                            <input type="checkbox" name="checkbox23" v-model="roleIds.updateLevel" value="3">
                            修改　
                            <input type="checkbox" name="checkbox24" v-model="roleIds.deleteLevel" value="4">
                            删除　

                        </td>

                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox3" value="checkbox"></td>
                        <td>积分规则设置</td>
                        <td><input type="checkbox" name="checkbox2232" v-model="roleIds.getJifenConfig" value="5">
                            查看　
                            <input type="checkbox" name="checkbox232" v-model="roleIds.saveMemberJifenConfig" value="6">
                            修改　

                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox4" value="checkbox"></td>
                        <td>会员管理</td>
                        <td><input type="checkbox" name="checkbox2233" v-model="roleIds.getMembersAdmin" value="7">
                            查看　
                            <input type="checkbox" name="checkbox233" v-model="roleIds.getUserById" value="9">
                            修改资料　
                            <input type="checkbox" name="checkbox243" v-model="roleIds.updateUserPassword" value="8">
                            重置密码　
                            </td>
                    </tr>

                    <tr class="tableHeader">
                        <td><input type="checkbox" name="checkbox42" value="checkbox"></td>
                        <td>信息管理</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox43" value="checkbox"></td>
                        <td>信息分类配置</td>
                        <td><input type="checkbox" name="checkbox2234" v-model="roleIds.NewsClassList" value="10">
                            查看　
                            <input type="checkbox" name="checkbox2222" v-model="roleIds.createNewsClass" value="12">
                            新增　
                            <input type="checkbox" name="checkbox2322" v-model="roleIds.updateNewsClass" value="13">
                            修改　
                            <input type="checkbox" name="checkbox2422" v-model="roleIds.deleteNewsClass" value="11">
                            删除　
                            </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox44" value="checkbox"></td>
                        <td>信息发布管理</td>
                        <td><input type="checkbox" name="checkbox2235" v-model="roleIds.getNewAdminList" value="14">
                            查看　
                            <input type="checkbox" name="checkbox2223" v-model="roleIds.getnewsEdit" value="16">
                            新增　
                            <input type="checkbox" name="checkbox2323" v-model="roleIds.getnewsEdit" value="16">
                            修改　
                            <input type="checkbox" name="deleteNewAdminList" v-model="roleIds.deleteNewAdminList" value="15">
                            删除　
                            </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox45" value="checkbox"></td>
                        <td>会员发布的信息</td>
                        <td><input type="checkbox" name="checkbox2236" v-model="roleIds.MemberNewsAdminList" value="17">
                            查看　
                            <input type="checkbox" name="checkbox2224" v-model="roleIds.shoulu" value="19">
                            收录　
                            <input type="checkbox" name="checkbox2324" v-model="roleIds.getnewsEditMember" value="20">
                            修改　
                            <input type="checkbox" name="checkbox2424" v-model="roleIds.deleteMemberNewsAdminList" value="18">
                            删除　
                            </td>
                    </tr>
                    <tr class="tableHeader">
                        <td><input type="checkbox" name="checkbox46" value="checkbox"></td>
                        <td>广告管理</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox47" value="checkbox"></td>
                        <td>首屏广告管理</td>
                        <td><input type="checkbox" name="checkbox2237" v-model="roleIds.getAdvertisingBy" value="21">
                            查看　
                            <input type="checkbox" name="checkbox2225" v-model="roleIds.createAdvertising" value="23">
                            新增　
                            <input type="checkbox" name="checkbox2325" v-model="roleIds.updateAdvertising" value="24">
                            修改　
                            <input type="checkbox" name="checkbox2425" v-model="roleIds.deleteAdvertising" value="22">
                            删除　
                            </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox48" value="checkbox"></td>
                        <td>系统设置</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox49" value="checkbox"></td>
                        <td>期初参数配置</td>
                        <td><input type="checkbox" name="checkbox2238"  >
                            查看　
                            <input type="checkbox" name="checkbox2326" >
                            修改设置</td>
                    </tr>
                    <tr class="tableHeader">
                        <td><input type="checkbox" name="checkbox410" value="checkbox"></td>
                        <td>系统设置</td>
                        <td><input type="checkbox" name="checkbox22382" v-model="roleIds.getSystemSetupList">
                            查看　
                            <input type="checkbox" name="checkbox23262" v-model="roleIds.updateSystemSetupList" >
                            修改设置</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox411" value="checkbox"></td>
                        <td>管理权限设置</td>
                        <td><input type="checkbox" name="checkbox22383" v-model="roleIds.getManageFunSetList" value="25">
                            查看　
                            <input type="checkbox" name="checkbox23263" v-model="roleIds.createManageFunSetListId" value="27">
                            新增角色　
                            <input type="checkbox" name="checkbox22384" v-model="roleIds.updateManageFunSetListId" value="26">
                            修改角色
                            <input type="checkbox" name="checkbox22385" v-model="roleIds.createManageFunSetListId" value="27">
                            新增成员　
                            <input type="checkbox" name="checkbox23264" v-model="roleIds.updateManageFunSetListId" value="29">
                            修改成员　
                            <input type="checkbox" name="checkbox23265" v-model="roleIds.updateManageFunSetListId" value="29">
                            设置权限</td>
                    </tr>
                </table>
                <button type="submit">保存</button>
            </form>
        </div>
    </div></template>

<script>
    export default {
        name: "adminbody",
    data(){
        return {
            roles:[],
            roleIds:[]
        }
         },
        mounted() {
            axios.get('/admin/system/getRole_fun/').then(response => {
                if (response.data == 0) {
                    this.$router.push({path: '/admin/role_error/'});
                }
                this.roles = response.data
            });

            axios.get('/admin/system/getRolesTrue/'+this.$route.params.id).then(response => {
                if (response.data == 0) {
                    this.$router.push({path: '/admin/role_error/'});
                }
                this.roleIds = response.data
            });
        },methods:{
            createRole:function(roleIds){

                axios.post('/admin/system/updateRoleIds', {
                    id:this.$route.params.id,
                    roleIds:this.roleIds
                }).then(function (response) {

                    alert("数据保存成功");
                }).catch(function (error) {
                    alert(error);
                });

            }
        }


    }
</script>

<style scoped>

</style>