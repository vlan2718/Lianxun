<template>


    <div>

        <topline topline="信息管理 > 信息发布管理"></topline>


        <adminbody></adminbody>
    </div>

</template>

<script>
    import topline from '../common/toplineNewscreate'
    import adminbody from './newsadmin/adminbody'
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
