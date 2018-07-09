<template>
    <div id="adminbody">
        <form v-on:submit.prevent="updateSystem(bibibi)">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td align="right" bgcolor="#e0e0e0">相关接口信息</td>
                    <td colspan="2" bgcolor="#e0e0e0">&nbsp;</td>
                    <td bgcolor="#e0e0e0"></td>
                </tr>
                <tr>
                    <td align="right">微信公众平台</td>
                    <td width="6%">APPID</td>
                    <td width="71%"><input type="text" v-model="bibibi.WECHAT_PLATFORM_APPID" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>APPScript</td>
                    <td><input type="text" v-model="bibibi.WECHAT_PLATFORM_APPScript" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">微信登录授权</td>
                    <td>APPID</td>
                    <td><input type="text" v-model="bibibi.WECHAT_WARRANT_APPID" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>APPID</td>
                    <td><input type="text" v-model="bibibi.WECHAT_WARRANT_APPID2" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">QQ登录授权</td>
                    <td>APPID</td>
                    <td><input type="text" v-model="bibibi.QQ_WARRANT_APPID" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>APPID</td>
                    <td><input type="text" v-model="bibibi.QQ_WARRANT_APPID2" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">个推授权</td>
                    <td>APPID</td>
                    <td><input type="text" v-model="bibibi.PERSONAL_WARRANT_APPID" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>APPID</td>
                    <td><input type="text" v-model="bibibi.PERSONAL_WARRANT_APPID2" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>APPID</td>
                    <td><input type="text" v-model="bibibi.PERSONAL_WARRANT_APPID3" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tableHeader">
                    <td align="right" bgcolor="#e0e0e0">相关文本信息</td>
                    <td colspan="2" bgcolor="#e0e0e0">&nbsp;</td>
                    <td bgcolor="#e0e0e0"></td>
                </tr>
                <tr>
                    <td align="right">索取邀请码说明</td>
                    <td colspan="2"><textarea name="textarea5" cols="60" rows="5" v-model="bibibi.INVITE_CODE_DESC"></textarea></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td width="12%" align="right">关于About</td>
                    <td colspan="2"><textarea name="textarea4" cols="60" rows="5" v-model="bibibi.ABOUT" ></textarea></td>
                    <td width="11%">&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">版权信息 </td>
                    <td colspan="2"><textarea name="textarea" cols="60" rows="5" v-model="bibibi.APP_VERSION" ></textarea></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">版本信息</td>
                    <td colspan="2"><textarea name="textarea2" cols="60" rows="6" v-model="bibibi.APP_PIRATE" ></textarea></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">举报原因</td>
                    <td colspan="2"><textarea name="textarea2" cols="60" rows="6" v-model="bibibi.REPORT_REASON" ></textarea></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">联系信息</td>
                    <td colspan="2"><textarea name="textarea3" cols="60" rows="5" v-model="bibibi.CONTACT_GIT"></textarea></td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td align="right">logo</td>
                    <td colspan="2"> <input type="file" name="image" style="width:120px;"   @change="onFileChange" ></td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td align="right">启动图</td>
                    <td colspan="2"> <input type="file" name="logoimage" style="width:120px;"   @change="onFileChangelogoimage" ></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td colspan="2"><input type="submit" name="Submit" value="提交保存"></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "adminbody",
        data(){
            return {
                bibibi:[],
                image:[],
                logoimage:[],
            }
        }, mounted(){
            axios.get('/admin/system/getSystemSetupList/').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }
                this.bibibi=response.data
            });
        },methods:{
            updateSystem:function (bibibi) {
                axios.post('/admin/system/updateSystemSetupList', {
                    bibibi:bibibi,
                    images:this.image,
                    logoimages:this.logoimage,
                }).then(response=> {
                    if (response.data == 0) {
                        this.$router.push({path: '/admin/role_error/'});
                    } else {
                    alert('保存成功');
                    }
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
            },
            onFileChangelogoimage(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImagelogoimage(files[0]);
            },
            createImagelogoimage(file) {
                var logoimage = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.logoimage = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

    }
</script>

<style scoped>

</style>
