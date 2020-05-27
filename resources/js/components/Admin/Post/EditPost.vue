<template>
    <form action="" @submit.prevent="UpdatePost">
        <div class="card-body">
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
                <label for="content">CONTENT</label>
                <input type="text" name="content" id="content" class="form-control"  placeholder="Enter Name..." aria-describedby="content-error"
                       v-model="post.content" v-bind:class="{'is-invalid':errors.content}">
                <span id="content-error" class="error invalid-feedback" v-if="errors.content" >{{errors.content[0]}}</span>
            </div>
            <div class="form-group">
                <label for="category">CATEGORY</label>
            <select name="category" id="category" v-model="post.category_id" class="form-control">
                <option selected disabled value="">Choose category</option>
                <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
            </select>
            </div>
            <div class="custom-file">
                <input type="file" name="image" id="image" class="custom-file-input"
                       @change="UpdateImage" v-bind:class="{'is-invalid':errors.image}">
                <label for="image" class="custom-file-label">Choose file</label>
                <p class="text-success">{{filename}}</p>
                <span class="error invalid-feedback" v-if="errors.image" >{{errors.image[0]}}</span>
            </div>
        </div>
        <div class="card-footer">
            <router-link :to="{name:'AllCategory'}" class="btn btn-secondary">CANCEL</router-link>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</template>
<script>
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
        getDataCategories(){
            this.axios
                .get('/api/category/')
                .then((response)=>{
                    this.categories=response.data
                })
        },
        getDataPost(){
            this.axios
                .get(`/api/post/edit/${this.$route.params.id}`)
                .then((response)=>{
                    this.post=response.data
                })
        },
        UpdateImage(e){
            this.post.image=e.target.files[0]
            this.filename="Selected File: "+ e.target.files[0].name

        },
        UpdatePost(){
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