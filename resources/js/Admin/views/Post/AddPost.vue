<template>
    <section class="content">
        <div class="col-lg-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">ADD NEW POST</h3>
                </div>

                <form class="form-horizontal" action="" @submit.prevent="AddPost">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">NAME</label>
                            <input type="text" id="name" name="name" placeholder="Name...." class="form-control"
                                   v-model="post.name" v-bind:class="{'is-invalid':errors.name}">
                            <p class="text-danger" v-if="errors.name">{{errors.name[0]}}</p>
                        </div>
                        <div class="form-group">
                            <label for="description">DESCRIPTION</label>
                            <input type="text" id="description" name="description" placeholder="Description...." class="form-control"
                                   v-model="post.description" v-bind:class="{'is-invalid':errors.description}" >
                            <p class="text-danger" v-if="errors.description">{{errors.description[0]}}</p>
                        </div>
                        <div class="form-group">
                            <label for="content">CONTENT</label>
                            <!--                <input type="text" id="content" name="content" placeholder="Content...." class="form-control"-->
                            <!--                       v-model="post.content" v-bind:classs="{'is-invalid':errors.content}">-->
                            <ckeditor v-model="post.content" id="content" name="content" v-bind:class="{'is-invalid':errors.content}"></ckeditor>
                            <!--                <textarea id="editor" v-model="post.content" name="content" class="ckeditor"></textarea>-->
                            <p class="text-danger" v-if="errors.content">{{errors.content[0]}}</p>
                        </div>
                        <div class="form-group">
                            <label for="category">CATEGORY</label>
                            <select name="category" id="category" v-model="post.category_id" class="form-control">
                                <option value="" selected disabled>Choose category</option>
                                <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input"
                                       @change="UploadImage" v-bind:class="{'is-invalid':errors.image}" ref="newPostImage" >
                                <label for="image" class="custom-file-label">CHOOSE FILE</label>

                                <img v-if="imageDisplay==true" ref="newPostImageDisplay" alt="" class="w-h-image-cover">
                                <img v-else src="font-end/images/No_Picture.jpg" alt="" class="w-h-image-cover">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">CREATE</button>
                        <router-link :to="{name:'AllPost'}" class="btn btn-secondary">CANCEL</router-link>
                    </div>
                </form>
            </div>

        </div>
N    </section>

</template>
<script>

    import * as categoryService from '../../service/category_service'
    import * as postService from '../../service/post_service'
    export default{
        data(){
            return {
                post:{
                    name:'',
                    description:'',
                    content:'',
                    category_id:'',
                    image:''
                },
                categories:[],
                errors:[],
                filename:'',
                imageDisplay:false
            }
        },

        created() {
            this.getDataCategory()
        },
        methods: {
//             getCkeditor(){
//                 CKEDITOR.replace('editor')
//             }
// ,
            getDataCategory:async function(){
                this.$Progress.start()
                try {
                    const response = await categoryService.showAllCategory()
                    this.categories=response.data
                    this.$Progress.finish()
                }catch (error) {
                    toast.fire({
                        icon:'error',
                        text:'Something wrongg. try again !'
                    })
                    this.$Progress.fail()
                }
            },
            UploadImage(e){
                this.imageDisplay = true

                this.post.image=this.$refs.newPostImage.files[0]
                // this.filename=this.$refs.filename.file[0].name
                let reader = new FileReader()

                reader.addEventListener('load', function () {
                    this.$refs.newPostImageDisplay.src = reader.result
                }.bind(this),false)
                reader.readAsDataURL(this.post.image)
            },
            AddPost:async function() {
                this.$Progress.start()
                let formdata = new FormData()
                formdata.append('name', this.post.name)
                formdata.append('description', this.post.description)
                formdata.append('content', this.post.content)
                formdata.append('category', this.post.category_id)
                formdata.append('image', this.post.image)

                try {
                    const response = await postService.createPost(formdata)
                    toast.fire({
                        icon:'success',
                        text:'Add new post successfully !'
                    })
                    this.$router.push({name:'AllPost'})
                    this.$Progress.finish()

                } catch(error) {
                    switch (error.response.status) {
                        case 422:
                            this.errors = error.response.data.errors
                            break

                        default:
                            toast.fire({
                                icon: 'error',
                                text: 'Oooppp, Something wrong !'
                            })
                    }

                }

            }
        }
    }
</script>
