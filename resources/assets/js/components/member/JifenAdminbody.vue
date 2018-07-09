<template>
    <div id="adminbody">
        <form v-on:submit.prevent="saveMemberJifenConfig(Jifens)">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td width="11%" align="right" bgcolor="#f0f0f0">积分项目</td>
                    <td width="68%" bgcolor="#f0f0f0">积分设置</td>
                    <td width="21%" bgcolor="#f0f0f0">&nbsp;</td>
                </tr>

                <tr v-for="Jifen in Jifens" :key="Jifens.id">
                    <td align="right">{{Jifen.name}}</td>
                    <td><input name="value" type="text" v-model="Jifen.value" size="10">
                        分</td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td align="right">&nbsp;</td>
                    <td><input type="submit" name="Submit" value="保存设置"></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "JifenAdminbody",
        data(){
            return {
                Jifens:[],
            }
        },
        mounted() {
            axios.get('/admin/member/getJifenConfig').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }
                this.Jifens=response.data
            })
        },
        methods:{
            saveMemberJifenConfig:function (Jifens) {
                axios.post('/admin/member/saveMemberJifenConfig', {
                    Jifens:Jifens
                }).then(response=>{
                    if(response.data == 0){
                        this.$router.push({path:'/admin/role_error/'});
                    }
                    alert('数据保存成功');
                }).catch(function (error) {
                    alert(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>