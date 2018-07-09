<template>
    <div id="adminbody">
        <form v-on:submit.prevent="updatePassword(password,NewPassword,NewPassword2)">
            <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tableLists">
                <tr>
                    <td align="right">原密码：</td>
                    <td><input type="text" name="password" v-model="password"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">新密码：</td>
                    <td><input type="text" name="NewPassword" v-model="NewPassword"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">确认密码：</td>
                    <td><input type="text" name="NewPassword2" v-model="NewPassword2"></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td><input type="submit" name="Submit" value="确定修改"></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "modManagePwdMain",
        data(){
            return{
                password:[],
                NewPassword:[],
                NewPassword2:[],
            }
        },
        methods:{
            updatePassword:function (password,NewPassword,NewPassword2) {
              if(NewPassword != NewPassword2){
                  alert('两次密码不一致')
              }else if(NewPassword==null){
                  alert('新密码不能为空')
              }else if (NewPassword2==null){
                  alert('确认密码不能为空')
              }else if(password==null){
                  alert('原始密码不能为空')
              }else {
                  axios.post('/admin/updatePasswordAdmin', {
                      password:password,
                      NewPassword:NewPassword,
                      NewPassword2:NewPassword2,
                  }).then(function (response) {
                    alert("密码修改成功");
                  }).catch(function (error) {
                      alert(error);
                  });
              }
            }
        }

    }
</script>

<style scoped>

</style>