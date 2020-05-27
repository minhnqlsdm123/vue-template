<template>
    <div class="col-lg-12 col-md-12">
        <h3 class="text-center">ADD NEW POST</h3>
        <form action="" @submit.prevent="AddPost">
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
                <input type="text" id="content" name="content" placeholder="Content...." class="form-control"
                       v-model="post.content" v-bind:classs="{'is-invalid':errors.content}">
                <p class="text-danger" v-if="errors.content">{{errors.content[0]}}</p>
            </div>
            <div class="form-group">
                <label for="category">CATEGORY</label>
                <select name="category" id="category" v-model="post.category_id" class="form-control">
                    <option value="" selected disabled>Choose category</option>
                    <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
                </select>
            </div>
            <div class="custom-file">
                <input type="file" name="image" id="image" class="custom-file-input" @change="UploadImage">
                <label for="image" class="custom-file-label">CHOOSE FILE</label>
                <p class="text-success">{{filename}}</p>
            </div>
            <button type="submit" class="btn btn-success">CREATE</button>
            <router-link :to="{name:'AllPost'}" class="btn btn-secondary">CANCEL</router-link>
        </form>
    </div>
</template>
<script>
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
                filename:''
            }
        },
        created() {
            this.getDataCategory()
        },
        methods: {
            getDataCategory(){
                this.axios
                    .get('/api/category/')
                    .then((response)=>{
                        this.categories=response.data
                    })
            },
            UploadImage(e){
                this.post.image=e.target.files[0]
                this.filename="Selected file : "+e.target.files[0].name
            },
            AddPost(){
                let formdata= new FormData()
                formdata.append('name',this.post.name)
                formdata.append('description',this.post.description)
                formdata.append('content',this.post.content)
                formdata.append('category',this.post.category_id)
                formdata.append('image',this.post.image)

                this.axios
                    .post('/api/post/add',formdata)
                    .then((response)=>{
                            this.filename = ""
                            toast.fire({
                                icon:'success',
                                text:'Add new Post successfully !'

                            })
                            this.$router.push({name:'AllPost'})
                    })
                    .catch((error)=>{
                        switch (error.response.status) {
                            case 422:
                                this.errors=error.response.data.errors
                                break

                            default:
                                toast.fire({
                                    icon:'error',
                                    text:'Oooppp, Something wrong !'
                                })
                        }
                    })

            }

        }
    }
</script>