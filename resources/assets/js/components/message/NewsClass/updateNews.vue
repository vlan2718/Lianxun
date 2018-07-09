<template>
    <div style="width:40%;margin:auto;margin-top:20px;">
        <form v-on:submit.prevent="createLevel(categoryId)">
            <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                <tr>
                    <td width="24%" align="right">分类名称</td>
                    <td width="25%"><input type="text" name="name" v-model="categoryId.name"></td>
                    <td width="45%"><input type="submit" name="Submit" value="保存"></td>
                    <td width="6%">&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "updateNews",
        props:['categoryId','categories'],
        methods:{
            createLevel:function (categoryId) {
                if (categoryId.id){
                    axios.post('/admin/message/updateNewsClass', {
                        id:categoryId.id,
                        name:categoryId.name,
                    }).then(response=>{
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            categoryId.id = response.data;
                            alert('数据保存成功');
                        }
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/message/createNewsClass', {
                        name:categoryId.name,
                        parent_id:0
                    }).then(response=> {
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            this.categories.push(categoryId);
                            categoryId.id = response.data;
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