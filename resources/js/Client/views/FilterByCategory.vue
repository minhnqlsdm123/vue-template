<template>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6"  v-for="post in posts">
                    <div class=" blog-entry justify-content-end" >
                        <router-link :to="{name:'ArticleDetail',params:{id:post.slug}}" class="block-20">
                            <img :src="`${post.image}`" alt="" >
                        </router-link>
                        <div class="text p-4 float-right d-block">
                            <div class="topper d-flex align-items-center">

                                <div class="pl-4 pr-4 py-3 align-self-stretch">

                                    <span class="mos">{{post.created_at}}</span>
                                </div>
                            </div>
                            <h3 class="heading mb-3"><router-link  :to="{name:'ArticleDetail',params:{id:post.slug}}">{{post.name}}</router-link></h3>
                            <p>{{post.description}}</p>
                            <p><a href="#" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data(){
            return {
                posts:[]
            }
        },
        created() {
            this.$Progress.start()
            this.axios
                .get(`/api/home/category/${this.$route.params.id}`)
                .then((response)=>{
                    this.posts=response.data
                    this.$Progress.finish()
                })
        }
    }
</script>