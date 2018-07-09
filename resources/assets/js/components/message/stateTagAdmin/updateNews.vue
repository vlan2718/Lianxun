<template>
    <div style="width:40%;margin:auto;margin-top:20px;">
        <form v-on:submit.prevent="createLevel(stateTagListsId)">
            <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                <tr>
                    <td width="24%" align="right">分类名称</td>
                    <td width="25%"><input type="text" name="name" v-model="stateTagListsId.name"></td>
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
                    axios.post('/admin/message/createStateTagAdminList', {
                        id:stateTagListsId.id,
                        name:stateTagListsId.name,
                    }).then(function (response) {
                        stateTagListsId.id = response.data;
                        alert('状态保存成功');
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/message/createStateTagAdminList', {
                        name:stateTagListsId.name,
                    }).then(response=> {
                        stateTagListsId.id = response.data.id;
                        this.stateTagLists.push(stateTagListsId);
                        alert('保存成功');
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