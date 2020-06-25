<template>
    <div>
        <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
<!--                <a class="navbar-brand" href="index.html">M-<i>Blog</i>.</a>-->
                <router-link v-bind:to="{name:'Home'}" class="navbar-brand">M-<i>Blog</i>.</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><router-link  v-bind:to="{name:'Home'}" class="nav-link">Home</router-link></li>
                        <li class="nav-item"><router-link  v-bind:to="{name:'Article'}" class="nav-link">Article</router-link></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link "  id="navbarDropdown" data-toggle="dropdown"  aria-expanded="false">
                                Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                <ul class="navbar-nav ml-auto" v-for="category in categories">
                                    <li><router-link   :to="{name:'filter',params:{id:category.slug}}" class="dropdown-item">
                                        {{category.name}}</router-link></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a href="about.html" class="nav-link">Team</a></li>
                        <li class="nav-item"><router-link  v-bind:to="{name:'About'}" class="nav-link">Contact</router-link></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->

        <div class="hero-wrap js-fullheight"  data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate">
                        <h2 class="subheading">Hello! Welcome to</h2>
                        <h1 class="mb-4 mb-md-0">M-blog</h1>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="text">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    <div class="mouse">
                                        <a href="#" class="mouse-icon">
                                            <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import * as categoryService from "../../Admin/service/category_service"
    import * as postService from "../../Admin/service/post_service"
export default {
    data(){
        return {
            categories:[]
        }
    },
    created() {
        this.getDataCategory()
    },
    methods:{
        getDataCategory:async function(){
            try {
                const response= await categoryService.showAllCategory()
                this.categories=response.data
            }catch (error) {
                console.log(error)
            }
        }

    }
}
</script>