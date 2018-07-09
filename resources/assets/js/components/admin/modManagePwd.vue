<template>


    <div>

        <topline topline="修改管理密码"></topline>

        <modManagePwdMain></modManagePwdMain>


    </div>

</template>

<script>
    import topline from '../common/topline'
    import modManagePwdMain from './modManagePwdMain'

    export default {
        components:{
            topline,
            modManagePwdMain,
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
