<template>
    <div>

        <topline topline="系统设置 > 权限设置"></topline>
        <adminbody></adminbody>
    </div>
</template>

<script>
    import topline from '../common/topline'
    import adminbody from './ManageFunSetOk/adminbody'
    export default {
        name: "ManageFunSetOk",
        components:{
            topline,
            adminbody
        }
    }
</script>

<style scoped>

</style>