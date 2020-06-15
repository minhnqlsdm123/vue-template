<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
<!--            <router-link :to="{name:'AddCategory'}" class="btn btn-success">ADD</router-link>-->
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th >STT</th>
                    <th>WEBSITE</th>
                    <th>EMAIL</th>
                    <th >PHONE</th>
                    <th >ADDR</th>
                    <th >CREATE AT</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(contact,stt) in contacts">
                    <td>{{stt+1}}</td>
                    <td>{{contact.web}}</td>
                    <td>{{contact.email}}</td>
                    <td>{{contact.phone}}</td>
                    <td>{{contact.addr}}</td>
                    <td>{{contact.created_at}}</td>
                    <td>
<!--                        <router-link :to="{name:'EditCategory',params:{id:category.id}}" class="btn btn-primary">EDIT</router-link>-->
<!--                        <button class="btn btn-danger" @click="DeleteCategory(category.id)">DELETE</button>-->
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
            contacts:[]
        }
    },
    created() {
        this.getDataContact()
    },
    methods:{
        getDataContact(){
            this.axios
                .get('/contact')
                .then((response)=>{
                    this.contacts=response.data
                })
        }
    }
}
</script>