<template>


<div>

    <topline topline="会员管理 > 会员积分规则"></topline>

    <adminbody></adminbody>


</div>

</template>

<script>
    import topline from '../common/topline'
    import adminbody from './adminbody'

    export default {
        components:{
            topline,
            adminbody,
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
