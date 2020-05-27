<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <router-link :to="{name:'AddCategory'}" class="btn btn-success">ADD</router-link>
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th >STT</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th >CREATE AT</th>
                    <th >ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(category,stt) in categories">
                    <td>{{stt+1}}</td>
                    <td>{{category.name}}</td>
                    <td>{{category.slug}}</td>
                    <td>{{category.created_at}}</td>
                    <td>
                        <router-link :to="{name:'EditCategory',params:{id:category.id}}" class="btn btn-primary">EDIT</router-link>
                        <button class="btn btn-danger" @click="DeleteCategory(category.id)">DELETE</button>
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
            categories:[],
            pagination:[]
        }

    },
    created() {
       this.getDataCategory()
    },
    methods:{
        getDataCategory(){
            this.axios
                .get('/api/category/')
                .then((response)=>{
                    this.categories=response.data
                })
        },
        DeleteCategory(id){
            toast.fire({
                icon:'warning',
                title:'Do you want delete?',
                showCancelButton:'true',
                showConfirmButton:'true',
                confirmButtonColor:'#007bff',
                cancelButtonColor:'#dc3545',

            })
            .then((result)=>{
                if (result.value){
                    this.axios
                        .delete('/api/category/delete/' + id)
                        .then((response)=>{
                            console.log(response.data)
                            this.categories.map(item=>item.id).indexOf(id)
                            toast.fire({
                                icon:'success',
                                title:'Deleted',
                                text:'Delete category successfully !'
                            })
                            this.getDataCategory()
                        })
                }
            })
            .catch(()=>{
                    toast.fire({
                        icon:'error',
                        title:'Ooppp, something wrong ?',
                        text:'You ckeck ....'
                    })
                })
        }
    }

}
</script>