<template>


    <div>
        <topline topline="会员管理 > 会员积分规则"></topline>

        <JifenAdminbody></JifenAdminbody>
    </div>

</template>

<script>
    import topline from '../common/topline'
    import JifenAdminbody from './JifenAdminbody'
    export default {
        components:{
            topline,
            JifenAdminbody
        },
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
            }
        }
    }

</script>
