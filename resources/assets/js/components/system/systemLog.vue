<template>
    <div>

        <topline topline="系统设置 > 系统日志"></topline>
        <adminbody></adminbody>
    </div>
</template>

<script>
    import topline from '../common/topline'
    import adminbody from './systemLog/adminbody'
    export default {
        name: "systemLog",
        components:{
            topline,
            adminbody
        }
    }
</script>

<style scoped>

</style>