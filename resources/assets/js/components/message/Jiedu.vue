<template>
    <div id="adminbody">
        <form name="form1" method="post" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                <tr class="tableHeader">
                    <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                    <td align="center">ID</td>

                    <td align="center">标签描述</td>

                    <td align="center">创建时间</td>

                    <td align="center">修改</td>
                    <td align="center">删除</td>
                </tr>
                <tr v-for="(Jiedu,index) in Jiedus" :key="Jiedus.id">
                    <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>

                    <td align="center">{{Jiedu.id}}</td>
                    <td align="center">{{Jiedu.content}}</td>
                    <td align="center">{{Jiedu.created_at}}</td>
                    <td align="center" @click="updatestateTagList(Jiedu)">修改</td>
                    <td align="center" @click="deleteTodo(Jiedu,index)">删除</td>
                </tr>
            </table>
        </form>

        <div style="width:40%;margin:auto;margin-top:20px;">
            <form v-on:submit.prevent="createLevel(JiedusId)">
                <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                    <tr>
                        <td width="24%" align="right"></td>
                        <td width="25%">解读<textarea name="name" v-model="JiedusId.content"></textarea></td>
                        <td width="45%"><input type="submit" name="Submit" value="保存"></td>
                        <td width="6%">&nbsp;</td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</template>

<script>
    export default {
        name: "adminTitle",
        components:{

        },mounted() {
            axios.get('/admin/message/getjiedu/'+this.$route.params.id).then(response=>{
                this.Jiedus=response.data
            })
        },data(){
            return {
                Jiedus:[0],
                JiedusId:[],

            }
        },methods: {
            updatestateTagList: function (stateTagList) {
                this.JiedusId = stateTagList
            },
            deleteTodo(Jiedu,index){
                var r=confirm("确定要删除？");
                if (r==true)
                {
                    axios.post('/admin/message/deleteJiedusId', {
                        id:Jiedu.id,
                    }).then(response=> {

                    }).catch(function (error) {
                        alert(error);
                    });
                    this.Jiedus.splice(index,1);

                }else
                {
                    alert("已取消删除");
                }

            },
            createLevel:function (JiedusId) {
                if (JiedusId.id){
                    axios.post('/admin/message/updateJiedu', {
                        id:JiedusId.id,
                        content_text:JiedusId.content,
                        news_id:this.$route.params.id
                    }).then(response=>{
                        this.$router.go(0);
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/message/createJiedu', {
                        id:JiedusId.id,
                        content_text:JiedusId.content,
                        news_id:this.$route.params.id
                    }).then(response=>{
                        JiedusId= response.data;

                            this.Jiedus.push(JiedusId)

                    }).catch(function (error) {

                    });

                }
            }
        }
    }
</script>

<style scoped>

</style>