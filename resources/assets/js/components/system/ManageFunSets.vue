<template>
    <div>

        <topline topline="管理权限设置"></topline>
        <adminbody></adminbody>
    </div>
</template>

<script>
    import topline from '../common/topline'
    import adminbody from './ManageFunSets/adminbody'
    export default {
        name: "ManageFunSet",
        components:{
            topline,
            adminbody
        }
    }
</script>

<style scoped>

</style>