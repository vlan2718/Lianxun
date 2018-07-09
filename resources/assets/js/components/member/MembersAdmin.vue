<template>


    <div>
        <topline topline="会员管理 "></topline>

        <MemberAdminbody></MemberAdminbody>
    </div>

</template>

<script>
    import topline from '../common/toplineNew'
    import MemberAdminbody from './MemberAdminbody'
    export default {
        components:{
            topline,
            MemberAdminbody
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
