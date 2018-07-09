<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td align="center">ID</td>
                    <td align="center">信息分类</td>
                    <td align="center">默认推荐</td>
                    <td align="center">主类显示</td>
                    <td align="center">修改</td>
                    <td align="center">名下子类</td>
                    <td align="center">删除</td>
                </tr>
                <tr v-for="(category,index) in categories" :key="categories.id">
                    <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                    <td align="center">{{category.id}}</td>
                    <td align="center">{{category.name}}</td>
                    <td align="center">推荐</td>
                    <td align="center" v-if="category.is_nav == 0">不显示</td>
                    <td align="center" v-else>显示</td>
                    <td align="center" @click="updateLevel(category)">修改</td>
                    <td align="center"><router-link :to="'/admin/message/NewsClassSon/'+category.id" tag="a">名下子类</router-link></td>
                    <td align="center" @click="deleteTodo(category,index)">删除</td>
                </tr>

            </table>
        </form>
        <updateNews :categoryId="categoryId" :categories="categories"></updateNews>

    </div>
</template>

<script>
    import updateNews from './updateNews'
    export default {
        name: "adminTitle",
        components:{
            updateNews
        },
        mounted() {
            axios.get('/admin/message/NewsClassList').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }
                this.categories=response.data
            })
        },data(){
            return {
                categories:[],
                categoryId:[],
            }
        },
        methods:{
            updateLevel:function (category) {
                this.categoryId=category
            },
            deleteTodo(category,index){
                var r=confirm("确定要删除？");
                if (r==true)
                {
                axios.post('/admin/message/deleteNewsClass', {
                    id:category.id,
                }).then(response=>{
                    if(response.data == 0){
                        this.$router.push({path:'/admin/role_error/'});
                    }else {
                        this.categories.splice(index,1);
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