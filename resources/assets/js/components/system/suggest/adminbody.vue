<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td width="2%" align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <!--<td width="4%" align="center">ID</td>-->

                    <td width="10%" align="center">用户名ID</td>

                    <!--<td width="14%" align="center">手机号</td>-->
                    <td width="14%" align="center">联系方式</td>
                    <td width="14%" align="center">内容</td>
                    <!--<td width="14%" align="center">提交时间</td>-->
                </tr>
                <tr v-for="(suggestList,index) in suggestLists" :key="suggestLists.id">
                    <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                    <td align="center">{{suggestList.user_id}}</td>
                    <!--<td align="center">{{suggestList.user_name}}</td>-->
                    <!--<td align="center">{{suggestList.user_mobile}}</td>-->
                    <td align="center">{{suggestList.contact}}</td>
                    <td align="center">{{suggestList.content}}</td>
                    <!--<td align="center">{{suggestList.create_at}}</td>-->


                </tr>
            </table>
        </form>

    </div>
</template>

<script>
    export default {
        name: "adminbody",
        mounted() {
            axios.get('/admin/system/suggestList/').then(response=>{
                this.suggestLists=response.data
            })
        },data(){
            return {
                suggestLists:[],
            }
        }
    }
</script>

<style scoped>

</style>