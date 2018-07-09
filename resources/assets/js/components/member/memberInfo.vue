<template>


    <div>
        <topline topline="会员管理 > 会员信息 "></topline>
        <infoadminbody></infoadminbody>
    </div>

</template>

<script>
    import topline from '../common/topline'
    import infoadminbody from './infoadminbody'
    export default {
        name:'memberInfo',

        components:{
            topline,
            infoadminbody
        },
        mounted() {
            console.log('Component mounted.');

        }


    }

</script>
