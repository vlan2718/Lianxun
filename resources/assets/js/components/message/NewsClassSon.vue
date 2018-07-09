<template>


    <div>

        <topline topline="信息管理 > 信息分类管理"></topline>
        <adminbody></adminbody>
    </div>

</template>

<script>
    import topline from '../common/topline'
    import adminbody from './NewsClassSon/adminbody'
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
