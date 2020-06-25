<template>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div v-for="post in posts" class="case">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
<!--                                <a href="blog-single.html" class="img w-100 mb-3 mb-md-0" style="background-image: url(images/image_9.jpg);"></a>-->
                                <router-link :to="{name:'ArticleDetail',params:{id:post.slug}}">
                                    <img v-bind:src="`${post.image}`" alt="" class="img w-100 mb-3 mb-md-0" style="object-fit: con">
                                </router-link>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                                <div class="text w-100 pl-md-3">
                                    <span class="subheading" v-if="post.category_id">{{post.category.name}}</span>
                                    <h2><router-link :to="{name:'ArticleDetail',params:{id:post.slug}}">{{post.name}}</router-link></h2>
                                    <ul class="media-social list-unstyled">
                                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>

                                    </ul>
                                    <div class="meta">
                                        <p class="mb-0"><a href="#">11/13/2019</a> | <a href="#">12 min read</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<!--        <div id="ftco-loader" class="show fullscreen" @distance="1" @infinite="getData">-->
<!--            <svg class="circular" width="48px" height="48px">-->
<!--                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>-->
<!--                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>-->
<!--            </svg>-->
<!--        </div>-->
<!--        <Loader/>-->
        <pagination v-bind:pagination="pagination" v-on:click.native="getData(pagination.current_page)" :offset="1"></pagination>
    </section>

</template>

<script>
    import * as pageService from '../../Client/service/page_service'
import Pagination from "../components/Pagination";
    export default {
        components: {Pagination },

        data(){
            return {
                posts:[],
                // url:'/home/',
                page:0,
                // pagination:[]
                pagination: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
            }
        },
        created() {
            this.getData()
        },
        methods:{
            getData:async function(page){
                try {
                    this.$Progress.start()
                    const response=await pageService.homeLoadData(page)
                    this.posts=response.data.data
                    this.pagination=response.data
                    this.$Progress.finish()
                }catch (e) {
                    this.$Progress.fail()
                }
            },


        }
    }
</script>