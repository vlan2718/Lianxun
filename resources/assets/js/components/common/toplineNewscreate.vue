<template>

    <div id="topline">
        <div id="adminTitle">{{topline}}</div>

        <div style=" float:left;padding-top:10px;">
            <form name="form3" method="post" action="">
                <select name="select11">
                    <option>按条件搜索</option>
                    <option>约定按什么条件</option>
                </select>
                <input type="text" name="textfield2">
                <input type="submit" name="Submit2" value="查询">
            </form>
        </div>
        <div id="rightFun">
            <div class="rightFunBtn"><router-link :to="'/admin/message/createNewAdminIndex'" tag="a">录入新信息</router-link> </div>
            <div class="rightFunBtn"><a href="">批量导入信息</a></div>
        </div>

    </div>


</template>

<script>
    export default {
        name: "toplineNewscreate",
        props:['topline']
    }
</script>

