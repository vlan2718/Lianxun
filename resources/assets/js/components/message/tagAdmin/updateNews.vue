<template>
    <div style="width:40%;margin:auto;margin-top:20px;">
        <form v-on:submit.prevent="createLevel(stateTagListsId)">
            <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                <tr>
                    <td width="24%" align="right"></td>
                    <td width="25%">分类名称<input type="text" name="name" v-model="stateTagListsId.name"></td>
                    <td width="25%">相关标签<input type="text" name="name" v-model="stateTagListsId.tag_relation_id_array"></td>
                    <td width="25%">标签描述<textarea name="name" v-model="stateTagListsId.description"></textarea></td>
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
        props:['stateTagListsId','stateTagLists'],
        methods:{
            createLevel:function (stateTagListsId) {
                if (stateTagListsId.id){
                    axios.post('/admin/message/createTagAdminList', {
                        id:stateTagListsId.id,
                        name:stateTagListsId.name,
                        description:stateTagListsId.description,
                        tag_relation_id_array:stateTagListsId.tag_relation_id_array,
                    }).then(response=>{
                        this.$router.go(0);
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/message/createTagAdminList', {
                        name:stateTagListsId.name,
                        description:stateTagListsId.description,
                        tag_relation_id_array:stateTagListsId.tag_relation_id_array,
                    }).then(response=>{
                        stateTagListsId= response.data;
                        this.stateTagLists.push(stateTagListsId)
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