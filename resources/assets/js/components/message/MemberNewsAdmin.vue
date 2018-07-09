<template>


    <div>

        <topline topline="信息管理 > 会员录入的信息管理"></topline>


        <adminbody></adminbody>
    </div>

</template>

<script>
    import topline from '../common/topline'
    import adminbody from './MemberNewsAdmin/adminbody'
    export default {
        components:{
            topline,
            adminbody
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
