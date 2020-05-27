<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <router-link :to="{name:'AddPost'}" class="btn btn-success">ADD</router-link>
            <br>

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
                        <router-link :to="{name:'DetailPost',params:{id:post.id}}" class="btn btn-secondary">DETAIL</router-link>
                        <router-link :to="{name:'EditPost',params:{id:post.id}}" class="btn btn-primary">EDIT</router-link>
                        <button class="btn btn-danger" @click="DeletePost(post.id)">DELETE</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            posts:[]
        }
    },
    created() {
        this.getDataPost()
    },
    methods:{
        getDataPost(){
            this.axios
                .get('/api/post/')
                .then((response)=>{
                    // console.log(response.data)
                    this.posts=response.data
                })
        },
        DeletePost(id){
            toast.fire({
                icon:'warning',
                title:'Do you want delete it !',
                showConfirmButton:true,
                showCancelButton:true,
                cancelButtonColor:'#dc3545'

            })
            .then((result)=>{
                if (result.value){
                    this.axios
                        .delete('/api/post/delete/'+id)
                        .then((response)=>{
                            let i = this.posts.map(item=>item.id).indexOf(id)
                            toast.fire({
                                icon:'success',
                                text:'delete post successfully !'
                            })
                            this.getDataPost()
                        })
                }
            })
            .catch(()=>{
                toast.fire({
                    icon:'error',
                    text:'Oopp, something wrongg !'
                })
            })
        }
    }
}
</script>