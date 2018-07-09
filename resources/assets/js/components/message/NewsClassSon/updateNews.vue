<template>
    <div style="width:35%;margin:auto;margin-top:20px;">
        <form v-on:submit.prevent="createLevel(categoryId)">
            <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                <tr>
                    <td width="16%" align="right">所属主类</td>

                    <td width="17%"  >
                        <select name="parent_id" v-model="categoryId.parent_id" >
                            <option v-for="(item ,index) in parentcategory"  v-bind:value="item.id">{{item.name}}</option>
                        </select>
                    </td>

                    <td width="21%" align="right">子分类名称</td>
                    <td width="30%"><input type="text" name="name" v-model="categoryId.name"></td>
                    <td width="12%"><input type="submit" name="Submit" value="保存"></td>
                    <td width="4%">&nbsp;</td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    export default {
        name: "updateNews",
        props:['categoryId','categories'],

    mounted() {
        axios.get('/admin/message/NewsClassList').then(response=>{
            this.parentcategory=response.data
        })
    },
        data(){
            return {
                parentcategory:[]
            }
        },
        methods:{
            createLevel:function (categoryId) {
                if (categoryId.id){
                    axios.post('/admin/message/createNewsClassSon', {
                        id:categoryId.id,
                        name:categoryId.name,
                        parent_id:categoryId.parent_id
                    }).then(function (response) {
                        categoryId.id = response.data;
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/message/createNewsClassSon', {
                        name:categoryId.name,
                        parent_id:categoryId.parent_id
                    }).then(response=> {
                        categoryId.id= response.data.id;
                        categoryId.parent_name= response.data.parent_name;

                        this.categories.push(categoryId)
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