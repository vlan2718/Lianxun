<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td width="2%" align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td width="4%" align="center">ID</td>
                    <td width="10%" align="center">主分类</td>
                    <td width="14%" align="center">分类名称</td>
                    <td width="47%" align="center">默认推荐</td>
                    <td width="10%" align="center">修改</td>
                    <td width="13%" align="center">删除</td>
                </tr>
                <tr v-for="(category,index) in categories" :key="categories.id">
                    <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                    <td align="center">{{category.id}}</td>
                    <td align="center">{{category.parent_name}}</td>
                    <td align="center">{{category.name}}</td>
                    <td align="center">推荐</td>
                    <td align="center" @click="updateLevel(category)">修改</td>
                    <td align="center" @click="deleteTodo(category,index)">删除</td>
                </tr>
            </table>
        </form>
        <updateNews :categoryId="categoryId" :categories="categories" ></updateNews>
    </div>
</template>

<script>
    import updateNews from './updateNews'
    export default {
        name: "adminbody",
        components:{
            updateNews
        },
        mounted() {
            axios.get('/admin/message/NewsClassSonList/'+this.$route.params.id).then(response=>{
                this.categories=response.data
            })
        },data(){
            return {
                categories:[],
                categoryId:[],
                categoryP:[]
            }
        },methods:{
        updateLevel:function (category) {
            this.categoryId=category
        },
        deleteTodo(category,index){
            var r=confirm("确定要删除？");
            if (r==true)
            {
            axios.post('/admin/message/deleteNewsClass', {
                id:category.id,
            }).then(function (response) {

            }).catch(function (error) {
                alert(error);
            });
            this.categories.splice(index,1);
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