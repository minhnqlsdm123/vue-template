<template>
    <section class="ftco-section">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
                <h2 class="mb-3">{{postDetail.name}}</h2>
                <p class="mb-5">
                    <img :src="`${postDetail.image}`" alt="" class="img-fluid">
                </p>
                <h3 class="description-align-center">{{postDetail.description}}</h3>
                <p v-html="postDetail.content"></p>
                <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">Life</a>
                        <a href="#" class="tag-cloud-link">Sport</a>
                        <a href="#" class="tag-cloud-link">Tech</a>
                        <a href="#" class="tag-cloud-link">Travel</a>
                    </div>
                </div>

<!--                <div class="about-author d-flex p-4 bg-light">-->
<!--                    <div class="bio mr-5">-->
<!--                        <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">-->
<!--                    </div>-->
<!--                    <div class="desc">-->
<!--                        <h3>George Washington</h3>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>-->
<!--                    </div>-->
<!--                </div>-->


<!--                <div class="pt-5 mt-5">-->
<!--                    <h3 class="mb-5">6 Comments</h3>-->
<!--                    <ul class="comment-list">-->
<!--                        <li class="comment">-->
<!--                            <div class="vcard bio">-->
<!--                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                            </div>-->
<!--                            <div class="comment-body">-->
<!--                                <h3>John Doe</h3>-->
<!--                                <div class="meta mb-3">November 13, 2019 at 2:21pm</div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                            </div>-->
<!--                        </li>-->

<!--                        <li class="comment">-->
<!--                            <div class="vcard bio">-->
<!--                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                            </div>-->
<!--                            <div class="comment-body">-->
<!--                                <h3>John Doe</h3>-->
<!--                                <div class="meta mb-3">November 13, 2019 at 2:21pm</div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                            </div>-->

<!--                            <ul class="children">-->
<!--                                <li class="comment">-->
<!--                                    <div class="vcard bio">-->
<!--                                        <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                                    </div>-->
<!--                                    <div class="comment-body">-->
<!--                                        <h3>John Doe</h3>-->
<!--                                        <div class="meta mb-3">November 13, 2019 at 2:21pm</div>-->
<!--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                        <p><a href="#" class="reply">Reply</a></p>-->
<!--                                    </div>-->


<!--                                    <ul class="children">-->
<!--                                        <li class="comment">-->
<!--                                            <div class="vcard bio">-->
<!--                                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                                            </div>-->
<!--                                            <div class="comment-body">-->
<!--                                                <h3>John Doe</h3>-->
<!--                                                <div class="meta mb-3">November 13, 2019 at 2:21pm</div>-->
<!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                                            </div>-->

<!--                                            <ul class="children">-->
<!--                                                <li class="comment">-->
<!--                                                    <div class="vcard bio">-->
<!--                                                        <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                                                    </div>-->
<!--                                                    <div class="comment-body">-->
<!--                                                        <h3>John Doe</h3>-->
<!--                                                        <div class="meta mb-3">November 13, 2019 at 2:21pm</div>-->
<!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                                        <p><a href="#" class="reply">Reply</a></p>-->
<!--                                                    </div>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->

<!--                        <li class="comment">-->
<!--                            <div class="vcard bio">-->
<!--                                <img src="images/person_1.jpg" alt="Image placeholder">-->
<!--                            </div>-->
<!--                            <div class="comment-body">-->
<!--                                <h3>John Doe</h3>-->
<!--                                <div class="meta mb-3">November 13, 2019 at 2:21pm</div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>-->
<!--                                <p><a href="#" class="reply">Reply</a></p>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    &lt;!&ndash; END comment-list &ndash;&gt;-->

<!--                    <div class="comment-form-wrap pt-5">-->
<!--                        <h3 class="mb-5">Leave a comment</h3>-->
<!--                        <form action="#" class="p-5 bg-light">-->
<!--                            <div class="form-group">-->
<!--                                <label for="name">Name *</label>-->
<!--                                <input type="text" class="form-control" id="name">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="email">Email *</label>-->
<!--                                <input type="email" class="form-control" id="email">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="website">Website</label>-->
<!--                                <input type="url" class="form-control" id="website">-->
<!--                            </div>-->

<!--                            <div class="form-group">-->
<!--                                <label for="message">Message</label>-->
<!--                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">-->
<!--                            </div>-->

<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->

            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar pl-lg-5 ftco-animate fadeInUp ftco-animated">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon icon-search"></span>
                            <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <div class="categories">
                        <h3>Categories</h3>
                        <li v-for="category in categories"><router-link :to="{name:'filter',params:{id:category.slug}}">{{category.name}}<span class="ion-ios-arrow-forward"></span></router-link></li>

                    </div>
                </div>

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3>Recent Blog</h3>
                    <div class="block-21 mb-4 d-flex" v-for="post in posts">
                        <a class="blog-img mr-4">
                            <img :src="`${post.image}`" alt="" class="w-h-100px">
                        </a>
                        <div class="text">
                            <h3 class="heading"><a href="#">{{post.name}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Nov. 14, 2019</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3>Tag Cloud</h3>
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">cat</a>
                        <a href="#" class="tag-cloud-link">abstract</a>
                        <a href="#" class="tag-cloud-link">people</a>
                        <a href="#" class="tag-cloud-link">person</a>
                        <a href="#" class="tag-cloud-link">model</a>
                        <a href="#" class="tag-cloud-link">delicious</a>
                        <a href="#" class="tag-cloud-link">desserts</a>
                        <a href="#" class="tag-cloud-link">drinks</a>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>

        </div>
    </div>
    </section>
</template>
<script>
    import * as categoryService from "../../Admin/service/category_service"
    import * as postService from "../../Admin/service/post_service"
export default {

    data(){
        return {
            postDetail:{
                name:'',
                description:'',
                content:'',
                image:''
            },
            posts:[],
            categories:[]

        }
    },
    created() {
        this.getDataCategory()
        this.getDataAllPost()
        this.getDataDetailPost()
    },
    methods:{
        getDataDetailPost(){
            this.axios
                .get(`/api/article/${this.$route.params.id}`)
                .then((response)=>{
                    this.postDetail=response.data
                })
                .catch((error)=>{
                    console.log(error)
                })
        },
        getDataCategory:async function(){
            try {
                const response = await categoryService.showAllCategory()
                this.categories=response.data
            }catch (error) {
                console.log(error)
            }
        },
        getDataAllPost:async function(){
            try {
                const response= await postService.loadPost()
                this.posts=response.data.data
            }catch (error) {
                console.log(error)
            }
        }
    }
}
</script>