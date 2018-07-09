<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td align="center">ID</td>
                    <td align="center">会员等级</td>
                    <td align="center">签到天数</td>
                    <td align="center">达标积分</td>
                    <td align="center">等级默认权限</td>
                    <td align="center">修改</td>
                    <td align="center">删除</td>
                </tr>

                    <tr v-for="(level,index) in levels" :key="levels.id">
                        <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                        <td align="center">{{level.level_name}}</td>
                        <td align="center">{{level.sign_days}}</td>
                        <td align="center">{{level.integral}}</td>
                        <td align="center">等级默认权限</td>
                        <td align="center" @click="updateLevel(level)" >修改</td>
                        <td align="center" @click="deleteTodo(level,index)">删除</td>
                    </tr>

            </table>
        </form>
        <addEditTable :levelId="levelId" :levels="levels"></addEditTable>
    </div>

</template>

<script>
    import addEditTable from './addEditTable'
    export default {
        name: "adminbody",

        components:{
            addEditTable
        },

        mounted() {
            axios.get('/admin/member/getLavelList').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }
                this.levels=response.data
            })
        },
        data(){
            return {
                levels:[],
                levelId:[]
            }
        },
        methods:{
            updateLevel:function (level) {
                this.levelId=level
            },
            deleteTodo(level,index){
                var r=confirm("确定要删除？");
                if (r==true)
                {
                axios.post('/admin/member/deleteLevel', {
                    id:level.id,
                }).then(response=> {
                    if(response.data == 0){
                        this.$router.push({path:'/admin/role_error/'});
                    }else {
                        this.levels.splice(index,1);
                        alert("已删除");
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