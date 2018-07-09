<template>
    <div>
        <topline topline="信息管理 > 会员信息编辑"></topline>
        <div id="adminbody">

            <form v-on:submit.prevent="updateNewAdmin(NewAdmin)">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableLists">
                    <tr>
                        <td width="16%" align="right" bgcolor="#f0f0f0">审核状态</td>
                        <td bgcolor="#f0f0f0"><a href="#">
                            <select name="status_examine" v-model="NewAdmin.status">
                                <option v-for="(item ,index) in status" v-bind:value="item.value">{{item.name}}</option>
                            </select>
                        </a></td>
                        <td align="right" bgcolor="#f0f0f0">&nbsp;</td>
                        <td bgcolor="#f0f0f0">&nbsp;</td>
                        <td width="31%" bgcolor="#f0f0f0">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">所属分类</td>
                        <td>
                            <select name="p_categories" v-model="NewAdmin.p_categories" @change="select_categories_p($event)">
                                <option v-for="(item ,index) in p_categories" v-bind:value="item.id"  >{{item.name}}</option>
                            </select>

                            <select name="category_id" v-model="NewAdmin.category_id">
                                <option v-for="(item ,index) in son_categories" v-bind:value="item.id">{{item.name}}</option>
                            </select>

                            <!--<select name="category_id" v-model="NewAdmin.category_id">-->
                                <!--<option v-for="(item ,index) in categories" v-bind:value="item.id">{{item.name}}</option>-->
                            <!--</select>-->
                        </td>
                        <td align="right">状态标签</td>
                        <td>
                            <select name="special_id" v-model="NewAdmin.status_label_id">
                            <option v-for="(item ,index) in special_ids" v-bind:value="item.id">{{item.name}}</option>
                        </select>
                        </td>
                        <!--<td rowspan="5" align="center"><div style="width:200px; height:136px; background:#CCC;"></div></td>-->
                    </tr>
                    <tr>
                        <td align="right">信息标题</td>
                        <td colspan="3"><input name="title" type="text" size="60" v-model="NewAdmin.title">

                            <input type="radio" name="checkbox3" v-model="NewAdmin.special_flag" v-bind:value="1" >
                            专题
                            <input type="radio" name="checkbox" v-model="NewAdmin.special_flag" v-bind:value="2" >
                            特供
                            <input type="radio" name="checkbox2" v-model="NewAdmin.special_flag" v-bind:value="3" >
                            最新</td>
                    </tr>
                    <!--<tr>-->
                        <!--<td align="right">信息来源</td>-->
                        <!--<td width="14%"><input type="text" name="source" v-model="NewAdmin.source"></td>-->
                        <!--<td width="9%" align="right">作者</td>-->
                        <!--<td width="40%"><input type="text" name="author" v-model="NewAdmin.author"></td>-->
                    <!--</tr>-->
                    <tr>
                        <td align="right">是否转载</td>
                        <td><input type="radio" name="import_type" value="1" v-model="NewAdmin.is_original" v-bind:value="1">
                            否
                            <input type="radio" name="import_type" value="0" v-model="NewAdmin.is_original" v-bind:value="0" >
                            是</td>
                        <td align="right">原文时间</td>
                        <td><input type="text" name="source_date" v-model="NewAdmin.created_at"></td>
                    </tr>
                    <!--<tr>-->
                        <!--<td align="right">原文地址</td>-->
                        <!--<td colspan="3"><input name="url" type="text" size="60" v-model="NewAdmin.url" ></td>-->
                    <!--</tr>-->
                    <tr>
                        <td align="right">信息短述</td>
                        <td colspan="3"><textarea name="textarea" style="width:100%; height:100px" v-model="NewAdmin.description"></textarea></td>
                        <!--<td align="center" valign="top">上传代表图：-->
                            <!--<input type="file" name="image" style="width:160px;">-->
                        <!--</td>-->
                    </tr>
                    <tr>
                        <td align="right" valign="top">信息详情</td>
                        <td colspan="3"><textarea name="content"  style="width:100%; height:100px" v-model="NewAdmin.content">这里是个编辑器</textarea></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">打标签</td>
                        <td colspan="3"><div class="addTagList">
                            <ul>
                                <li v-for="(item, index) in stateTagAdminLists">
                                    {{ item.name }}
                                </li>
                                <li @click="addstateTag(NewAdmin.id)" style="cursor:pointer">+</li>
                            </ul>
                        </div></td>
                        <td>&nbsp;</td>
                    </tr>
                    <!--<tr>-->
                        <!--<td align="right">上传附件</td>-->
                        <!--<td colspan="3"><input type="file" name="attachment"></td>-->
                        <!--<td>&nbsp;</td>-->
                    <!--</tr>-->
                    <tr>
                        <td align="right">浏览权限</td>
                        <td colspan="3"><input type="radio" name="radiobutton" value="radiobutton">
                            所有人            </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">&nbsp;</td>
                        <td colspan="3"><input type="radio" name="publics" value="0">
                            仅所有会员
                            <select name="publics">
                                <option selected value="0">所有会员</option>
                                <option v-for="(item ,index) in levels " v-bind:value="item.id">{{item.level_name}}</option>
                            </select>
                            <input name="checkbox42" type="checkbox" value="checkbox" checked>
                            仅认证会员可浏览 （<a href="#">设置黑白名单</a>）</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">&nbsp;</td>
                        <td colspan="3"><input type="submit" name="Submit" value="提交保存" class="button" style="width:100px; height:35px; line-height:35px; font-size:14px;"></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </form>
        </div>


    </div>
</template>

<script>
    import topline from '../common/topline'
    import stateTag from './stateTag'
    export default {
        name: "updateNewAdminList",
        components:{
            topline,

        },
        methods:{
            select_categories_p:function (event) {
                let pid=this.NewAdmin.p_categories;
                this.son_categories=this.p_categories[pid]['son'];
                console.log(pid);
                console.log(this.son_categories);
            },
            updateNewAdmin:function (NewAdmin) {

                    axios.post('/admin/message/updateMemberNewAdmin', {
                        id:NewAdmin.id,
                        status:NewAdmin.status,
                        category_id:NewAdmin.category_id,
                        title:NewAdmin.title,
                        status_label_id:NewAdmin.status_label_id,
                        // source:NewAdmin.source,
                        is_original:NewAdmin.is_original,
                        created_at:NewAdmin.created_at,
                        //url:NewAdmin.url,
                        public:NewAdmin.publics,
                        description:NewAdmin.description,
                        //image:NewAdmin.image,
                        //attachment:NewAdmin.attachment,
                        contents:NewAdmin.content,
                    }).then(response=>{
                        this.$router.push({path:'/admin/message/MemberNewsAdmin'});
                    }).catch(function (error) {
                        alert(error);
                    });
            },
            addstateTag:function () {
                this.$layer.iframe({
                    content: {
                        content: stateTag, //传递的组件对象
                        parent: this,//当前的vue对象
                        data:{NewAdminID:this.NewAdmin.id}
                    },
                    area:['400px','300px'],
                    title: '标签添加'
                });
            }
        },
        mounted() {
            axios.get('/admin/message/getnewsEditMemberNewsAdminList/'+this.$route.params.id).then(response=>{
                if(response.data == 0){
                    this.$router.push({path:'/admin/role_error/'});
                }else {
                    this.NewAdmin=response.data
                }
            }).catch(function (error) {
                alert(error);
            });
            axios.get('/admin/message/NewsClassListAllSon').then(response=>{
                this.categories=response.data;
                this.son_categories=response.data
            });
            axios.get('/admin/member/getLavelList').then(response=>{
                this.levels=response.data
            });
            axios.get('/admin/message/getStateTagAdminListByUser_news/'+this.$route.params.id).then(response=>{
                this.stateTagAdminLists=response.data
            });
            axios.get('/admin/message/stateTagAdminList/').then(response=>{
                this.special_ids=response.data
            });
            axios.get('/admin/message/getNewsClassList').then(response=>{
                this.p_categories=response.data
            });
        },
        data(){
            return{
                levels:[],
                NewAdmin:[],
                categories:[],
                p_categories:[],
                son_categories:[],
                stateTagAdminLists:[],
                status:[
                    {name:'待审核',id:0 ,value:0},
                    {name:'审核中',id:1 ,value:1},
                    {name:'退回修改',id:2,value:2},
                    {name:'审核通过',id:3,value:3}
                ],
                special_ids:[]
            }
        }
    }
</script>

<style scoped>

</style>