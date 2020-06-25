<template>
    <section class="content">
        <div class="col-lg-12 col-md-12">
            <div class="box-header with-border">
                <h3 class="text-center">ADD NEW POST</h3>
            </div>
            <form class="form-horizontal" action="" @submit.prevent="UpdatePost">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"  placeholder="Enter Name..." aria-describedby="name-error"
                               v-model="post.name" v-bind:class="{'is-invalid':errors.name}">
                        <span id="name-error" class="error invalid-feedback" v-if="errors.name" >{{errors.name[0]}}</span>
                    </div>
                    <div class="form-group">
                        <label for="description">DESCRIPTION</label>
                        <input type="text" name="description" id="description" class="form-control"  placeholder="Enter Name..." aria-describedby="description-error"
                               v-model="post.description" v-bind:class="{'is-invalid':errors.description}">
                        <span id="description-error" class="error invalid-feedback" v-if="errors.description" >{{errors.description[0]}}</span>
                    </div>
                    <div class="form-group">
                        <label >CONTENT</label>
                        <ckeditor v-model="post.content" id="content" name="content" v-bind:class="{'is-invalid':errors.content}" ></ckeditor>
                        <p class="text-danger" v-if="errors.content">{{errors.content[0]}}</p>
                        <span id="content-error" class="error invalid-feedback" v-if="errors.content" >{{errors.content[0]}}</span>
                    </div>
                    <div class="form-group">
                        <label for="category">CATEGORY</label>
                        <select name="category" id="category" v-model="post.category_id" class="form-control">
                            <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
                        </select>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input"
                               @change="UpdateImage" v-bind:class="{'is-invalid':errors.image}" ref="newPostImage">
                        <label for="image" class="custom-file-label">Choose file</label>
                        <img v-bind:src="`${post.image}`" alt="" class="w-h-image-cover" ref="newPostImageDisplay">
                        <span class="error invalid-feedback" v-if="errors.image" >{{errors.image[0]}}</span>
                    </div>
                </div>
                <div class="box-footer">
                    <router-link :to="{name:'AllPost'}" class="btn btn-secondary">CANCEL</router-link>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </section>


</template>
<script>
    import * as categoryService from '../../service/category_service'
    import * as postService from '../../service/post_service'
export default {
    data(){
        return {
            post:{},
            errors:[],
            categories:[],
            filename:''
        }
    },
    created() {
        this.getDataCategories()
        this.getDataPost()
    },
    methods:{
        getDataCategories: async function(){

            try {
                const response = await categoryService.showAllCategory()
                this.categories=response.data

            }catch (error) {
                toast.fire({
                    icon:'error',
                    text:'Something Wrong......'
                })
            }
        },
        getDataPost: function(post,params){
            this.$Progress.start()
            this.axios
                .get(`/api/post/edit/${this.$route.params.id}`)
                .then((response)=>{
                    this.post=response.data
                    this.$Progress.finish()
                })
            // try {
            //     // const response= await postService.editPost(post.id,params)
            //     console.log('asdsadsa')
            //     this.post=response.data.data
            // }catch (e) {
            //     console.log(e)
            // }
        },
        UpdateImage(e){
            this.post.image=this.$refs.newPostImage.files[0]
            let reader = new FileReader()
            reader.addEventListener('load', function () {
                this.$refs.newPostImageDisplay.src = reader.result
            }.bind(this),false)
            reader.readAsDataURL(this.post.image)

        },
        UpdatePost(){
            this.$Progress.start()
            let formdata= new FormData()
            formdata.append('name',this.post.name)
            formdata.append('description',this.post.description)
            formdata.append('content',this.post.content)
            formdata.append('category',this.post.category_id)
            formdata.append('image',this.post.image)

            this.axios
                .post(`/api/post/update/${this.$route.params.id}`,formdata)
                .then((response)=>{
                    toast.fire({
                        icon:'success',
                        text:'Update Post successfully !'
                    })
                    this.$router.push({name:'AllPost'})
                    this.$Progress.finish()
                })
                .catch((error)=>{
                    switch (error.response.status) {
                        case 422:
                            this.errors=error.response.data.errors
                            break
                        default:
                            toast.fire({
                                icon:'error',
                                text:'Ooppp, something wrongg !'
                            })
                    }
                })
        }
    }
}
</script>