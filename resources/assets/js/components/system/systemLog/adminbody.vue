<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td width="2%" align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td width="4%" align="center">ID</td>

                    <td width="10%" align="center">管理员</td>
                    <td width="14%" align="center">执行操作</td>
                    <td width="14%" align="center">执行时间</td>
                </tr>
                <tr v-for="(systemLogList,index) in systemLogLists" :key="systemLogLists.id">
                    <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                    <td align="center">{{systemLogList.id}}</td>
                    <td align="center">{{systemLogList.admin_id}}</td>
                    <td align="center">{{systemLogList.action}}</td>
                    <td align="center">{{systemLogList.created_at}}</td>



                </tr>
            </table>
        </form>

    </div>
</template>

<script>
    export default {
        name: "adminbody",
        mounted() {
            axios.get('/admin/system/systemLogLists/').then(response=>{
                this.systemLogLists=response.data
            })
        },data(){
            return {
                systemLogLists:[],
            }
        }
    }
</script>

<style scoped>

</style>