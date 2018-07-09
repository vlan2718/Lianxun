<template>
    <div style="width:60%;margin:auto;margin-top:20px;">

        <form  v-on:submit.prevent="createLevel(levelId)">
            <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                <tr>
                    <td align="right">会员等级</td>
                    <td><input type="text" name="level_name" v-model="levelId.level_name"></td>
                    <td align="right">签到天数</td>
                    <td><input type="text" name="sign_days" v-model="levelId.sign_days"></td>
                    <td align="right">达标积分</td>
                    <td><input type="text" name="integral" v-model="levelId.integral"></td>
                    <td><input type="submit" name="Submit" value="保存"></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "addEditTable",
        props:['levelId','levels'],
        methods:{
            createLevel:function (levelId) {
                if (levelId.id){
                    axios.post('/admin/member/updateLevel', {
                        id:levelId.id,
                        level_name:levelId.level_name,
                        sign_days:levelId.sign_days,
                        integral:levelId.integral,
                    }).then(response=>{
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            levelId.id = response.data;
                            alert('数据保存成功');
                        }
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/member/createLevel', {
                        level_name:levelId.level_name,
                        sign_days:levelId.sign_days,
                        integral:levelId.integral,
                    }).then(response=> {
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            this.levels.push(levelId);
                            levelId.id = response.data;
                            alert('数据保存成功');
                        }
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