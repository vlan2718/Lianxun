<template>
    <div id="adminbody">

        <div style="float:left; width:900px; height:300px; padding:20px;">
            <div>
                <form name="form1" method="post" action="">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                        <tr class="tableHeader">
                            <td align="center">ID</td>
                            <td align="center">广告名称</td>
                            <td align="center">发布时段</td>
                            <td align="center">排序</td>
                            <td align="center">链接</td>
                            <td align="center">状态</td>
                            <td align="center">修改</td>
                            <td align="center">删除</td>
                        </tr>
                        <tr v-for="(advertising,index) in advertisings" :key="advertisings.id">
                            <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                            <td align="center">{{advertising.name}}</td>
                            <td align="center">{{advertising.from_time}}至{{advertising.end_time}}</td>
                            <td align="center">拉下</td>
                            <td align="center">{{advertising.url}}</td>
                            <td align="center">已发布</td>
                            <td align="center" @click="updateLevel(advertising)">修改</td>
                            <td align="center" @click="deleteTodo(advertising,index)">删除</td>
                        </tr>

                    </table>
                </form>
            </div>
            <div style="margin:auto;margin-top:20px;">
                <form v-on:submit.prevent="createLevel(advertisingId)">
                    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="addEditTable">
                        <tr>
                            <td align="right">广告名称</td>
                            <td><input type="text" name="name" v-model="advertisingId.name"></td>
                            <td align="right">发布时段</td>
                            <td><input name="from_time" type="text" size="15" v-model="advertisingId.from_time"></td>
                            <td align="right">至</td>
                            <td><input name="end_time" type="text" size="15" v-model="advertisingId.end_time"></td>
                            <td align="right">播放时长</td>
                            <td><input name="duration" type="text" value="6" size="3" v-model="advertisingId.duration">
                                秒</td>
                        </tr>
                        <tr>
                            <td align="right">上传图片</td>
                            <td><input type="file" name="image" style="width:150px;" @change="onFileChange" ></td>
                            <td align="right">链接地址</td>
                            <td colspan="3"><input name="image" type="text" size="45" v-model="advertisingId.url"></td>
                            <td colspan="2" align="center"><input type="submit" name="Submit" value="保存"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>


        <div style="float:left; width:400px; padding:20px">
            <div style="width:360px; height:620px; background:#CCC; position:relative; border:1px solid #CCC">
                <div style="padding:20px; height:490px;position:relative">
                    <img v-bind:src="advertisingId.image" style="padding:20px; height:490px;position:relative" />
                    <div style="border:1px solid #999; border-radius:15px; width:40px; height:15px; padding:3px; text-align:center; line-height:15px;margin:0px; float:right">广告</div>
                    <div style="position:absolute;bottom:0px; width:70px; left:50%; margin-left:-35px;">
                        <ul>
                            <li style="width:8px; height:8px; background:#FFF; border-radius:30px; float:left; margin:5px;"></li>
                            <li style="width:8px; height:8px; background:#FFF; border-radius:30px; float:left; margin:5px;"></li>
                            <li style="width:8px; height:8px; background:#FFF; border-radius:30px; float:left; margin:5px;"></li>
                        </ul>
                    </div>
                </div>
                <div style="clear:both; width:100%; height:80px; background:#FFF; position:absolute; bottom:0px;"></div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "adminbody",
        mounted() {
            axios.get('/admin/advertise/getAdvertisingBy').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }else{
                    this.advertisings=response.data
                }
            })
        },data(){
            return {
                advertisings:[],
                advertisingId:[],
                image:[],
            }
        },methods: {
            updateLevel: function (advertisingId) {

                this.advertisingId = advertisingId
            },deleteTodo(advertising,index){
                var r=confirm("确定要删除？");
                if (r==true)
                {
                axios.post('/admin/advertise/deleteAdvertising', {
                    id:advertising.id,
                }).then(response=> {

                    if(response.data == 0){
                        this.$router.push({path:'/admin/role_error/'});
                    }else {

                        this.advertisings.splice(index,1);
                    }

                }).catch(function (error) {
                    alert(error);
                });

            }else
                {
                    alert("已取消删除");
    }
            },
            createLevel:function (advertisingId) {
                if (advertisingId.id){
                    axios.post('/admin/advertise/updateAdvertising', {
                        id:advertisingId.id,
                        name:advertisingId.name,
                        images:this.image,
                        from_time:advertisingId.from_time,
                        url:advertisingId.url,
                        end_time:advertisingId.end_time,
                        duration:advertisingId.duration,
                    }).then(response=> {
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                            advertisingId.id = response.data;
                        }
                    }).catch(function (error) {
                        alert(error);
                    });
                } else {
                    axios.post('/admin/advertise/createAdvertising', {
                        name:advertisingId.name,
                        images:this.image,
                        url:advertisingId.url,
                        from_time:advertisingId.from_time,
                        end_time:advertisingId.end_time,
                        duration:advertisingId.duration,
                    }).then(response=>{
                        if(response.data == 0){
                            this.$router.push({path:'/admin/role_error/'});
                        }else {
                           if (this.advertisings == null) {
                               this.$router.go(0);
                           }else {
                               this.advertisings.push(advertisingId);
                               advertisingId.id = response.data;
                           }

                        }

                    }).catch(function (error) {
                        alert(error);
                    });

                }
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    }
</script>

<style scoped>

</style>