<template>


    <div>

        <topline topline="信息管理 > 信息分类管理"></topline>

        <adminTitle></adminTitle>

    </div>

</template>

<script>
    import topline from '../common/topline'
    import adminTitle from './NewsClass/adminTitle'


    export default {
        components:{
            topline,
            adminTitle,
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
