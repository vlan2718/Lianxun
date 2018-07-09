<template>

    <div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div v-for="post in posts" :key="posts.id">
                        {{ post.mobile}}
                    </div>

                </div>
            </div>
        </div>
    <Home></Home>
    </div>
    </div>

</template>

<script>
import Home from './Home'

    export default {
    components:{
        Home,
    },
        mounted() {
        axios.get('/test/user').then(response=>{
            this.posts=response.data
        })
        },
        data(){
            return {
                posts:[]

            }
        }
    }
</script>
