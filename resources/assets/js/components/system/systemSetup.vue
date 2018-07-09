<template>
    <div>
    <topline topline="系统设置 > 系统设置"></topline>
    <adminbody></adminbody>
    </div>
</template>

<script>
    import topline from '../common/topline'
    import adminbody from './systemSetup/adminbody'
    export default {
        name: "systemSetup",
        components:{
            topline,
            adminbody
        }
    }
</script>

<style scoped>

</style>