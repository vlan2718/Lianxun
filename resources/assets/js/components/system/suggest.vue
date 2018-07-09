<template>
    <div>

        <topline topline="建议反馈"></topline>
        <adminbody></adminbody>
    </div>
</template>

<script>
    import topline from '../common/topline'
    import adminbody from './suggest/adminbody'
    export default {
        name: "suggest",
        components:{
            topline,
            adminbody
        }
    }
</script>

<style scoped>

</style>