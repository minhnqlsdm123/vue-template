<template>
    <form action="" @submit.prevent="AddCategory">
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
        methods:{
            AddCategory(){
                let formdata=new FormData()
                formdata.append('name',this.category.name)
                this.axios
                    .post('/category/add',formdata)
                    .then((response)=>{
                        console.log(response.data)
                        toast.fire({
                            icon:'success',
                            text:'Add new Category successfully !'
                        })
                        this.$router.push({name:'AllCategory'})
                    })
                    .catch((error)=>{
                        switch (error.response.status) {
                            case 422:
                                this.errors=error.response.data.errors
                            break

                            default:
                                toast.fire({
                                    icon:'error',
                                    text:'Oopp, something wrongg !'
                                })

                        }

                    })
            }
        }
    }
</script>