<template>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div v-for="post in posts" class="case">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
<!--                                <a href="blog-single.html" class="img w-100 mb-3 mb-md-0" style="background-image: url(images/image_9.jpg);"></a>-->
                                <img v-bind:src="`${post.image}`" alt="" class="img w-100 mb-3 mb-md-0">
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                                <div class="text w-100 pl-md-3">
                                    <span class="subheading" v-if="post.category_id">{{post.category.name}}</span>
                                    <h2><a href="blog-single.html">{{post.name}}</a></h2>
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
<!--        <Loader/>-->
    </section>

</template>

<script>

    export default {
        data(){
            return {
                posts:[],

            }
        },
        created() {
            this.getData()
        },
        methods:{
            getData(){
                this.axios
                    .get('/api/post/')
                    .then((response)=>{
                        this.posts=response.data
                    })
            }
        }
    }
</script>