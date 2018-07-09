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
    </div>

</template>

<script>
    export default {
        name: "topline",
        props:['topline']
    }
</script>

