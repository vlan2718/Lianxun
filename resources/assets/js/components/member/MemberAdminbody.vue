<template>
    <div>
        <div id="adminbody">
            <form name="form1" method="post" action="">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                    <tr class="tableHeader">
                        <td align="center"><input type="checkbox" name="checkbox" value="checkbox"></td>
                        <td align="center">ID</td>
                        <td align="center">受邀</td>
                        <td align="center">手机账号</td>
                        <td align="center">邀请码</td>
                        <td align="center">状态</td>
                        <td align="center">一对一消息</td>
                        <td align="center">会员昵称</td>
                        <td align="center">等级</td>
                        <td align="center">签到</td>
                        <td align="center">积分</td>
                        <td align="center">重置密码</td>
                        <td align="center">阅读</td>
                        <td align="center">收藏</td>
                        <td align="center">录入</td>
                        <td align="center">收录</td>
                        <td align="center">发布</td>
                        <td align="center">修改资料</td>
                    </tr>

                    <tr v-for="User in Users" :key="Users.id">
                        <td align="center"><input type="checkbox" name="checkbox2" value="checkbox"></td>
                        <td align="center">{{User.id}}</td>
                        <td align="center"><span v-if="User.reg_invite_code" @click="getreg_invite_code(User.reg_invite_code)">受邀</span></td>
                        <td align="center"><router-link :to="'/admin/member/Info/'+User.id" tag="a">{{User.mobile}}</router-link></td>
                        <td align="center"><a href="javascript:alert('这是给本人生成的邀请码，用于邀请别人注册');void(0);">{{User.user_invited_code}}</a></td>
                        <td align="center">
                            <select name="user_status" v-model="User.user_status" >
                            <option v-for="(item ,index) in category" v-bind:value="item.value">{{item.name}}</option>
                        </select>
                        </td>
                        <td align="center"><input type="button" name="Submit22" value="一对一消息"  @click="message(User.id)"></td>
                        <td align="center">{{User.nickname}}</td>
                        <td align="center">{{User.level_name}}</td>
                        <td align="center">{{User.sign}}天</td>
                        <td align="center">{{User.integral}}</td>
                        <td align="center" @click="updatePassword(User.id)"> 重置密码</td>
                        <td align="center"><a href="#">{{User.history}}</a></td>
                        <td align="center"><a href="#">{{User.subscribe}}</a></td>
                        <td align="center"><a href="#">{{User.luru}}</a></td>
                        <td align="center"><a href="#">{{User.shoulu}}</a></td>
                        <td align="center"><a href="#">{{User.fabu}}</a></td>
                        <td align="center"><router-link :to="'/admin/member/Info/'+User.id" tag="a">修改资料</router-link></td>
                    </tr>

                </table>

            </form>
        </div>
        <button @click="messageIDs()">群发消息 </button>
    </div>

</template>

<script>
   import message from '../toMessage/message'
   import messageUser from '../toMessage/messagesUsers'
    export default {
        name: "MemberAdminbody",
        components:{
            message,
            messageUser
        },
        data(){
            return {
                Users:[],
                category:[
                    {name:'未激活',id:1 ,value:1},
                    {name:'已激活',id:2,value:2},
                    {name:'暂停中',id:3,value:3},
                    {name:'已停用',id:4,value:4}
                ],

            }
        },
        mounted() {
            axios.get('/admin/member/getMembersAdmin').then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }else {
                    this.Users=response.data
                }


            })
        },
        methods:{
            getreg_invite_code:function (reg_invite_code) {
                axios.post('/admin/member/getUserByReg_invite_code', {
                    reg_invite_code:reg_invite_code,
                }).then(function (response) {
                alert('受邀于用户:'+response.data.nickname)
                }).catch(function (error) {
                    alert(error);
                });
            },
            message:function (UserId) {
                this.$layer.iframe({
                    content: {
                        content: message, //传递的组件对象
                        parent: this,//当前的vue对象
                        data:{UserId}
                    },
                    area:['400px','300px'],
                    title: '消息发送'
                });
            },
            messageIDs:function(){
                this.$layer.iframe({
                    content: {
                        content: messageUser, //传递的组件对象
                        parent: this,//当前的vue对象
                        data:{}
                    },
                    area:['400px','300px'],
                    title: '群发'
                });
            },
            updatePassword:function (UserId) {
                var password=prompt("请输入密码","");
                if (password!=null && password!="")
                {
                    axios.post('/admin/member/updateUserPassword', {
                        password:password,
                        userId:UserId
                    }).then(response=> {
                        if(response.data == 0){
                            alert('您没有权限修改密码')
                            // this.$router.push({path:'/admin/role_error/'});
                        }else {
                            alert('修改成功')
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