<template>
    <form action="" @submit.prevent="UpdateCategory">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"  placeholder="Enter Name..." aria-describedby="name-error"
                       v-model="category.name" v-bind:class="{'is-invalid':errors.name}">
                <span id="name-error" class="error invalid-feedback" v-if="errors.name" >{{errors.name[0]}}</span>
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
                category:{
                    name:''
                },
                errors:[],

            }
        },
        created() {
            this.getDataCategory()
        },
        methods: {
            getDataCategory(){
                this.axios
                    .get(`/api/category/edit/${this.$route.params.id}`)
                    .then((response)=>{
                        console.log(response.data)
                        this.category=response.data
                    })
            },
            UpdateCategory(){

                let formdata=new FormData()
                formdata.append('name',this.category.name)
                this.axios
                    .post(`/api/category/update/${this.$route.params.id}`,formdata)
                    .then((response)=>{
                        console.log(response.data)
                        this.category=this.$router.push({name:'AllCategory'})

                    })
                    .catch((error)=>{
                        if (error.response.status==422){
                            this.errors=error.response.data.errors
                        }
                    })
            }
        }
    }
</script>