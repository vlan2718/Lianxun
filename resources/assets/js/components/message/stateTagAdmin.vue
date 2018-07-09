<template>


    <div>

        <topline topline="信息管理 > 状态标签维护管理"></topline>

        <adminTitle></adminTitle>

    </div>

</template>

<script>
    import topline from '../common/topline'
    import adminTitle from './stateTagAdmin/adminTitle'

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
