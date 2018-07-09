<template>
    <div id="adminbody">

        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader" >
                    <td width="2%" align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td width="2%" align="center">ID</td>
                    <td width="6%" align="center">主类</td>
                    <td width="5%" align="center">子类</td>
                    <td width="19%">信息标题</td>
                    <td width="8%" align="center">信息解读</td>
                    <td width="7%" align="center">发布时间</td>
                    <td width="3%" align="center">阅读</td>
                    <td width="3%" align="center">收藏</td>
                    <td width="2%" align="center">赞/评分</td>
                    <td width="2%" align="center">下载量</td>
                    <td colspan="2" align="center">信息来源</td>
                    <td width="7%" align="center">审核</td>
                    <td width="7%" align="center">编辑</td>
                    <td width="7%" align="center">删除</td>
                    <td width="9%" align="center">操作日志</td>
                </tr>
                <tr v-for="(NewAdminList,index) in NewAdminLists" :key="NewAdminLists.id">
                    <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                    <td align="center">{{NewAdminList.id}}</td>
                    <td width="6%" align="center">{{NewAdminList.categoryP_name}}</td>
                    <td align="center">{{NewAdminList.category_name}}</td>
                    <td><a href="#" onClick="alert('本文正在被其它管理员修订中，暂不可编辑！');return;">{{NewAdminList.title}}</a></td>
                    <td align="center"><router-link :to="'/admin/message/jiedu/'+NewAdminList.id" tag="a">共{{NewAdminList.special_comment}}条</router-link></td>
                    <td align="center">{{NewAdminList.created_at}}</td>
                    <td align="center"><a href="#">{{NewAdminList.read}}</a></td>
                    <td align="center"><a href="#">{{NewAdminList.subscribe}}</a></td>
                    <td align="center"><a href="#">{{NewAdminList.read}}</a></td>
                    <td align="center"><a href="#">{{NewAdminList.subscribe}}</a></td>
                    <td width="2%" align="center" v-if="NewAdminList.is_origin == 1">转载</td>
                    <td width="2%" align="center" v-else>原创</td>
                    <td width="5%" align="center" ><a href="http://www.qq.com" target="_blank">{{NewAdminList.source}}</a></td>
                    <td align="center"><a href="#">
                        <select name="status_examine" v-model="NewAdminList.status">
                            <option v-for="(item ,index) in status" v-bind:value="item.value">{{item.name}}</option>
                        </select>
                    </a></td>
                    <td align="center" v-if="NewAdminList.status_xiuding ==0"><a href="#" onClick="alert('本文正在被其它管理员修订中，暂不可编辑！');return;">修订中</a></td>
                    <td align="center" v-else><router-link :to="'/admin/message/newsEdit/'+NewAdminList.id" tag="a">编辑</router-link></td>
                    <td align="center" @click="deleteTodo(NewAdminList,index)">删除</td>
                    <td align="center"><a href="#">操作日志</a></td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "adminbody",
    mounted() {

        axios.get('/admin/message/getNewAdminList').then(response=>{

            if(response.data == 0){
                this.$router.push({path:'/admin/role_error/'});
            }
            this.NewAdminLists=response.data
        });



       },data(){
            return {
                NewAdminLists:[],
                status:[
                    {name:'待审核',id:0 ,value:0},
                    {name:'审核中',id:1 ,value:1},
                    {name:'退回修改',id:2,value:2},
                    {name:'审核通过',id:3,value:3}
                ]

            }
        },
        methods: {
            deleteTodo(NewAdminList,index){
                var r=confirm("确定要删除？");
                if (r==true)
                {
                axios.post('/admin/message/deleteNewAdminList', {
                    id:NewAdminList.id,
                }).then(response=>{
                    if(response.data == 0){
                        this.$router.push({path:'/admin/role_error/'});
                    }else {
                        alert("已删除");
                    }
                }).catch(function (error) {
                    alert(error);
                });
                this.NewAdminLists.splice(index,1);

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