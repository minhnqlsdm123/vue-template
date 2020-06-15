<template>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Category</h4>
            <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                <router-link :to="{name:'AddPost'}" class="btn btn-success">ADD</router-link>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <br>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <strong>Search By :</strong>
                    </div>
                    <div class="col-md-3">
                        <select v-model="queryFiled" class="form-control" id="fileds">
                            <option value="name">Name</option>
                            <option value="category">Category</option>
                        </select>
                    </div>
                    <div class="col-md-7">
                        <input v-model="query" type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th >STT</th>
                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>IMAGE</th>
                    <th >CREATE AT</th>
                    <th >ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(post,stt) in posts">
                    <td>{{stt+1}}</td>
                    <td>{{post.name}}</td>
                    <td v-if="post.category_id">{{post.category.name}}</td>
                    <td><img v-bind:src="`${post.image}`" style="width: 40px; height: 40px" alt=""></td>
                    <td>{{post.created_at}}</td>
                    <td>
<!--                        <router-link :to="{name:'DetailPost',params:{id:post.id}}" class="btn btn-secondary">DETAIL</router-link>-->
                        <router-link :to="{name:'EditPost',params:{id:post.id}}" class="btn btn-primary">EDIT</router-link>
<!--                        <router-link :to="`/post/edit/${post.id}`" class="btn btn-primary">EDIT</router-link>-->
                        <button class="btn btn-danger" @click="DeletePost(post)">DELETE</button>
                    </td>
                </tr>


                </tbody>
            </table>
            <div class="card-footer">
                <pagination v-if="this.query==''" v-bind:pagination="pagination" v-on:click.native="getDataPost(pagination.current_page)" :offset="1"></pagination>
                <pagination v-else v-bind:pagination="pagination" v-on:click.native="searchData(pagination.current_page)" :offset="1"></pagination>

            </div>

        </div>
    </div>
</template>
<script>
    import * as postService from '../../service/post_service';
    import Pagination from '../../components/Pagination'
    export default {
        components: {Pagination },
    data(){
        return {
            posts:[],
            url:'/post',
            query: "",
            queryFiled: "name",
            pagination: {
                total: 0,
                per_page: 2,
                from: 1,
                to: 0,
                current_page: 1
            },
        }
    },
        watch: {
            query: function(newQ, old) {
                if (newQ === "") {
                    this.getDataPost();
                } else {
                    this.searchData();
                }
            }

        },
        mounted() {
            if(this.query===""){
                this.getDataPost(this.pagination.current_page);
            }else{
                this.searchData(this.pagination.current_page);
            }

        },

    // created() {
    //     if(this.query===""){
    //         this.getDataPost(this.pagination.current_page);
    //     }else{
    //         this.searchData(this.pagination.current_page);
    //     }
    // },
    methods:{
        getDataPost:async function(page){
            try {
                const response= await postService.loadPost(page)
                // let $this = this
                this.posts=response.data.data
                // this.makePagination(response.data)
                this.pagination = response.data
                console.log(this.pagination)

            }catch (e) {
                toast.fire({
                    icon:'error',
                    text:'Ooop, something wrong ! Please try again'
                })
            }
        },
        
        searchData(page) {
            // this.$Progress.start();
            this.axios.get(
                "/api/post/search/" +
                this.queryFiled +
                "/" +
                this.query +
                "?page=" +
                this.pagination.current_page
            )
                .then(response => {
                    this.posts = response.data.data;
                    this.pagination = response.data
                    // this.$Progress.finish();
                    console.log(this.pagination);

                })
                .catch(e => {
                    console.log(e);
                    this.$Progress.fail();
                });
        },
        DeletePost(post){
            toast.fire({
                icon:'warning',
                title:'Do you want delete post '+'"'+post.name+'" ?',
                showConfirmButton:true,
                showCancelButton:true,
                cancelButtonColor:'#dc3545'

            })
            .then((result)=>{
                if (result.value){
                    // this.axios
                    //     .delete('/api/post/delete/'+id)
                    //     .then((response)=>{
                    //         let i = this.posts.map(item=>item.id).indexOf(id)
                    //         toast.fire({
                    //             icon:'success',
                    //             text:'delete post successfully !'
                    //         })
                    //         this.getDataPost()
                    //     })
                    try {
                        const response = postService.deletePost(post.id)
                        toast.fire({
                            icon:'success',
                            text:'Delete Post successfully !'
                        })
                        this.getDataPost()
                    }catch (error) {
                        toast.fire({
                            icon:'error',
                            text:'Something wrongg !'
                        })
                    }
                }
            })
            .catch(()=>{
                toast.fire({
                    icon:'error',
                    text:'Oopp, something wrongg !'
                })
            })
        },
        // makePagination(data){
        //     let pagination = {
        //         current_page:data.current_page,
        //         last_page:data.last_page,
        //         next_page_url:data.next_page_url,
        //         prev_page_url:data.prev_page_url
        //     }
        //     this.pagination=pagination
        //     console.log(this.pagination)
        // },
        //
        // fetchPaginate(url){
        //     this.url=url
        //     this.getDataPost()
        // }
    }
}
</script>