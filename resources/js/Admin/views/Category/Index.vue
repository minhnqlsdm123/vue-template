<template>
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h4 class="card-title">Category</h4>
                <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                    <button type="button" class="btn btn-primary" data-toggle="modal"  @click="showModalAddCategory" >
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </button>
<!--                    <button type="button" class="btn btn-primary" @click="reload">-->
<!--                        Reload-->
<!--                        <i class="fas fa-sync"></i>-->
<!--                    </button>-->
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <strong>Search By :</strong>
                    </div>
                    <div class="col-md-3">
                        <select v-model="queryFiled" class="form-control" id="fileds">
                            <option value="name">Name</option>
                            <option value="slug">Slug</option>
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
                    <th>SLUG</th>
                    <th>IMAGE</th>
                    <th >CREATE AT</th>
                    <th >ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(category,stt) in categories">
                    <td>{{stt+1}}</td>
                    <td>{{category.name}}</td>
                    <td>{{category.slug}}</td>
                    <td><img :src="`${category.image}`" alt="" class="w-h-100px" ></td>
                    <td>{{category.created_at}}</td>
                    <td>
                        <a data-id="category.id" class="btn btn-secondary" @click="showModalEditCategory(category)">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger" @click="DeleteCategory(category)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
           <div class="card-footer">
               <pagination v-bind:pagination="pagination" v-on:click.native="getDataCategory(pagination.current_page)" :offset="1"></pagination>

           </div>
        </div>

        <b-modal hide-footer hide-header ref="newCategoryModal">
            <div class="modal-header">
                <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New User</h5>
                <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update User</h5>
            </div>
            <br>
            <form role="form" @submit.prevent="editMode ? UpdateCategory() : AddCategory()">
            <div class="modal-body">
                <!-- /.box-header -->
                <!-- form start -->

                        <div class="form-group">
                            <label for="name">NAME</label>
                            <input type="text" id="name" name="name" class="form-control"  placeholder="Enter Name..."
                                v-model="addCategory.name" v-bind:class="{'is-invalid':errors.name}" v-if="this.editMode==false">
                            <input type="text" id="name" name="name" class="form-control"  placeholder="Enter Name..."
                                v-model="editCategory.name" v-bind:class="{'is-invalid':errors.name}" v-if="this.editMode==true">
                            <span class="invalid-feedback" v-if="errors.name">{{errors.name[0]}}</span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" class="form-control inputImage" ref="newCategoryImage"
                                @change="UploadImage" v-bind:class="{'is-invalid':errors.image}">
                            <div>
                                <img v-if="this.editMode==false" ref="newCategoryImageDisplay" alt="" class="w-h-100px">
                                <img v-else v-bind:src="`${editCategory.image}`" ref="newCategoryImageDisplay" alt="" class="w-h-100px">
                            </div>
                            <span class="invalid-feedback" v-if="errors.image">{{errors.image[0]}}</span>
                        </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="hideModalCategory">Cancel</button>
                    <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
                    <button v-show="!editMode" type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </b-modal>


    </div>



</template>

<script>
    import * as categoryService from '../../service/category_service'
    import Pagination from "../../components/Pagination";
export default {
    components:{Pagination},
    data(){
        return {
            editMode: false,
            query: "",
            queryFiled: "name",
            categories:[],
            pagination: {
                total: 0,
                per_page: 2,
                from: 1,
                to: 0,
                current_page: 1
            },
            addCategory:{
                name:'',
                image:''
            },
            editCategory:{
                name:'',
                image:''
            },
            errors:[],
            isLoading:false,

        }

    },
    watch: {
        query: function(newQ, old) {
            if (newQ === "") {
                this.getDataCategory();
            } else {
                this.searchData();
            }
        }
    },
    // created() {
    //     this.getDataCategory()
    // },
    mounted(){
        this.getDataCategory()
    },
    methods:{
        getDataCategory: async function(page) {
            try{

                const response= await categoryService.loadCategory(page)
                // console.log(response)
                this.categories=response.data.data
                this.pagination=response.data


            }catch(error){
                toast.fire({
                    icon:'error',
                    text:'Ooop, something wrong ! Please try again'
                })
            }
        },
        searchData() {
            this.$Progress.start();
            this.axios.get(
                    "/api/category/search/" +
                    this.queryFiled +
                    "/" +
                    this.query +
                    "?page=" +
                    this.pagination.current_page
                )
                .then(response => {
                    this.categories = response.data.data;
                    this.pagination = response.data;
                    this.$Progress.finish();
                    console.log(response.data.data);

                })
                .catch(e => {
                    console.log(e);
                    this.$Progress.fail();
                });
        },

        //Delete Category
        DeleteCategory:async function(category){
            toast.fire({
                icon:'warning',
                title:'Do you want delete Category '+'"' +category.name+'"',
                showCancelButton:'true',
                showConfirmButton:'true',
                confirmButtonColor:'#007bff',
                cancelButtonColor:'#dc3545',
            })
            .then((result)=>{
                if (result.value){
                    try{
                        categoryService.deleteCategoy(category.id)
                        // this.categories.map(item=>item.id).indexOf(id)
                        toast.fire({
                            icon:'success',
                            title:'Deleted',
                            text:'Delete category successfully !'
                        })
                        this.getDataCategory()
                    }catch (error) {
                        toast.fire({
                            icon:'error',
                            text:'something wrong..!'
                        })
                    }
                }
            })
            .catch(()=>{
                    toast.fire({
                        icon:'error',
                        title:'Ooppp, something wrong ?',
                        text:'You ckeck ....'
                    })
                })
        },

        //Show Modal
        showModalCategory(){
            this.$refs.newCategoryModal.show();
        },
        //Hide Modal
        hideModalCategory(){
            this.$refs.newCategoryModal.hide();
        },

        showModalAddCategory(){
            this.editMode=false
            this.showModalCategory()
        },
        //Upload Image Category
        UploadImage(e){
            if (this.editMode==false){
                this.addCategory.image=this.$refs.newCategoryImage.files[0]
            }else{
                this.editCategory.image=this.$refs.newCategoryImage.files[0]
            }

            let reader = new FileReader()
            reader.addEventListener('load', function () {
                this.$refs.newCategoryImageDisplay.src=reader.result
            }.bind(this),false)

            if (this.editMode==false){
                reader.readAsDataURL(this.addCategory.image)
            }else{
                reader.readAsDataURL(this.editCategory.image)
            }
        },

        //Add Category
        AddCategory: async function(){
            let formdata=new FormData()
            formdata.append('name',this.addCategory.name)
            formdata.append('image',this.addCategory.image)
            try {
                const response= await categoryService.CreateCategory(formdata)
                toast.fire({
                    icon:'success',
                    text: 'Add new Category successfully !'
                })
                console.log(response)
                this.hideModalCategory()
                this.getDataCategory()
                
            }catch (error) {
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
            }
        },

        //Edit Category
        showModalEditCategory(category){
            this.editMode = true
            this.showModalCategory()
            this.editCategory=category

        },

        //Update Category
        UpdateCategory:async function(){
            let formdata = new FormData()
            formdata.append('name',this.editCategory.name)
            formdata.append('image',this.editCategory.image)

            try {
                const response= await categoryService.updateCategory(this.editCategory.id,formdata)
                toast.fire({
                    icon:'success',
                    text: 'Update Category successfully !'
                })
                console.log(response)
                this.hideModalCategory()
                this.getDataCategory()

            }catch (error) {
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
            }
        }
    }

}
</script>