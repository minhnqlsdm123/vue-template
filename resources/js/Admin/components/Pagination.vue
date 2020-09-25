<template>

<!--    <nav aria-label="Page navigation example">-->
<!--        <ul class="pagination">-->
<!--            <li class="page-item" :class="{ disabled: pagination.current_page <= 1 }">-->
<!--                <a class="page-link" @click.prevent="changePage(1)"  >First page</a>-->
<!--            </li>-->
<!--            <li class="page-item" v-if="pagination.current_page > 1">-->
<!--                <a class="page-link" href="#" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)"> < </a>-->
<!--            </li>-->
<!--            <li class="page-item" v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">-->
<!--                <a class="page-link" href="#" v-on:click.prevent="changePage(page)">{{page}}</a>-->
<!--            </li>-->
<!--            <li class="page-item" v-if="pagination.current_page < pagination.last_page">-->
<!--                <a class="page-link" href="#" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)"> > </a>-->
<!--            </li>-->
<!--            <li class="page-item" :class="{ disabled: pagination.current_page >= pagination.last_page }">-->
<!--                <a class="page-link" @click.prevent="changePage(pagination.last_page)">Last page</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <li class="page-item" v-bind:class="{disabled: pagination.current_page <= 1}">
            <a class="page-link" @click.prevent="changePage(1)">First Page</a>
        </li>
        <li class="page-item" v-bind:class="pagination.current_page > 1">
            <a class="page-link" href="#" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page -1)"> < </a>
        </li>
        <li class="page-item" v-for="page in pagesNumber" v-bind:class="{'active' : page == pagination.current_page}">
            <a class="page-link" href="#" v-on:click.prevent="changePage(page)">{{page}}</a>
        </li>
        <li class="page-item" v-bind:class="pagination.current_page < pagination.last_page">
            <a class="page-link" href="#" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page +1)"> > </a>
        </li>
        <li class="page-item" v-bind:class="{disabled: pagination.current_page >= pagination.last_page}">
            <a class="page-link" @click.prevent="changePage(pagination.last_page)">Last Page</a>
        </li>
    </ul>
</nav>
</template>
<script>
    export default{
        props: {
            pagination: {
                type: Object,
                requried:true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber() {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset
                if (from < 1){
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page
                }

                let pagesArray = [];
                for (from = 1; from <= to; from++) {
                    pagesArray.push(from);
                }
                return pagesArray;
            }
        },
        methods : {
                changePage: function (page) {
                    this.pagination.current_page = page;
                }
            }
        // props: {
        //     pagination: {
        //         type: Object,
        //         required: true
        //     },
        //     offset: {
        //         type: Number,
        //         default: 4
        //     }
        // },
        // computed: {
        //     pagesNumber: function () {
        //         if (!this.pagination.to) {
        //             return [];
        //         }
        //         var from = this.pagination.current_page - this.offset;
        //         if (from < 1) {
        //             from = 1;
        //         }
        //         var to = from + (this.offset * 2);
        //         if (to >= this.pagination.last_page) {
        //             to = this.pagination.last_page;
        //         }
        //         var pagesArray = [];
        //         for (from = 1; from <= to; from++) {
        //             pagesArray.push(from);
        //         }
        //         return pagesArray;
        //     }
        // },
        // methods : {
        //     changePage: function (page) {
        //         this.pagination.current_page = page;
        //     }
        // }
    }
</script>
