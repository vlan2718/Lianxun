<template>


    <div>

        <topline topline="信息管理 > 通用标签维护管理"></topline>

        <adminTitle></adminTitle>

    </div>

</template>

<script>
    import topline from '../common/topline'
    import adminTitle from './tagAdmin/adminTitle'

    export default {
        components:{
            topline,
            adminTitle
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
