<template>


    <div>

        <topline topline="广告管理 > 首屏广告管理"></topline>


        <adminbody></adminbody>
    </div>

</template>

<script>
    import topline from '../common/topline'
    import adminbody from './adminbody'
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
