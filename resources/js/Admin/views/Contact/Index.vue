<template>
    <div class="card">
        <div class="card-body">
            <div class="tableFilters">
                <div class="form-group">
                    <input class="form-control" type="text" v-model="search" placeholder="Search Table"
                           @input="resetPagination()" style="width:50%">
                </div>
                <div class="form-group">
                    <div class="select">
                        <select v-model="length" @change="resetPagination()">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
            </div>
            <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders">
                <tbody>
                <tr v-for="(contact) in paginated" :key="contact.id">
                    <td>{{contact.web}}</td>
                    <td>{{contact.email}}</td>
                    <td>{{contact.phone}}</td>
                    <td>{{contact.addr}}</td>
                    <td>
                        <!--                        <router-link :to="{name:'DetailPost',params:{id:post.id}}" class="btn btn-secondary">DETAIL</router-link>-->
                        <button class="btn btn-primary">EDIT</button>
                        <!--                        <router-link :to="`/post/edit/${post.id}`" class="btn btn-primary">EDIT</router-link>-->
                        <button class="btn btn-danger" >DELETE</button>
                    </td>
                </tr>
                </tbody>
            </datatable>
        </div>
        <div class="card-footer">
            <pagination :pagination="pagination" :filtered="filteredProjects"
                        @prev="--pagination.currentPage"
                        @next="++pagination.currentPage">
            </pagination>
        </div>
    </div>
</template>
<script>
    import Pagination from "../../components/Pagination";
    import Datatable from "../../components/Datatable";
    import PaginationExample from "../../components/PaginationExample";
export default {
    components:{datatable:Datatable, pagination:PaginationExample},
    created() {
        this.getDataContact();
    },
    data(){
        let sortOrders = {};
        let columns = [
            {width:'33%', label:'Web', name:'web', type:'id'},
            {width:'33%', label:'Email', name:'email'},
            {width:'33%', label:'Phone', name:'phone'},
            {width:'33%', label:'Addr', name:'addr'},
            {width:'33%', label:'Action'}

        ];
        columns.forEach((column) => {
            sortOrders[column.name] = -1;
        });
        return {
            contacts:[],
            columns: columns,
            sortKey: 'web',
            sortOrders: sortOrders,
            // perPage: ['10', '20', '30'],
            length:10,
            search:'',
            tableData: {
            },
            pagination: {
                currentPage: 1,
                total: '',
                nextPage: '',
                prevPage: '',
                from: '',
                to: ''
            }
        }
    },
    computed: {
        filteredProjects() {
            let contacts = this.contacts;
            if (this.search) {
                contacts = contacts.filter((row) => {
                    return Object.keys(row).some((key) => {
                        return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                    })
                });
            }
            let sortKey = this.sortKey;
            let order = this.sortOrders[sortKey] || 1;
            if (sortKey) {
                contacts = contacts.slice().sort((a, b) => {
                    let index = this.getIndex(this.columns, 'name', sortKey);
                    a = String(a[sortKey]).toLowerCase();
                    b = String(b[sortKey]).toLowerCase();
                    if (this.columns[index].type && this.columns[index].type === 'date') {
                        return (a === b ? 0 : new Date(a).getTime() > new Date(b).getTime() ? 1 : -1) * order;
                    } else if (this.columns[index].type && this.columns[index].type === 'number') {
                        return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
                    } else {
                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    }
                });
            }
            return contacts;
        },
        paginated() {
            return this.paginate(this.filteredProjects, this.length, this.pagination.currentPage);
        },
    },
    methods: {
        getDataContact() {
            // this.tableData.draw++;
            this.axios.get('/api/contacts/', {params: this.tableData})
                .then(response => {
                    this.contacts = response.data;
                    this.pagination.total = this.contacts.length;
                })
                .catch(errors => {
                    console.log(errors);
                })
        },
        paginate(array, length, pageNumber) {
            this.pagination.from = array.length ? ((pageNumber - 1) * length) + 1 : ' ';
            this.pagination.to = pageNumber * length > array.length ? array.length : pageNumber * length;
            this.pagination.prevPage = pageNumber > 1 ? pageNumber : '';
            this.pagination.nextPage = array.length > this.pagination.to ? pageNumber + 1 : '';
            return array.slice((pageNumber - 1) * length, pageNumber * length);
        },
        resetPagination() {
            this.pagination.currentPage = 1;
            this.pagination.prevPage = '';
            this.pagination.nextPage = '';
        },
        sortBy(key) {
            this.resetPagination();
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        getIndex(array, key, value) {
            return array.findIndex(i => i[key] == value)
        }
    }
}
</script>
