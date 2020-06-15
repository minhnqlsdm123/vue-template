<template>
<!--    <nav>-->
<!--        <div class="pagination">-->
<!--            <button v-if="pagination.current_page > 1">-->
<!--                <a href="#" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">-->
<!--                    <span aria-hidden="true">«</span>-->
<!--                </a>-->
<!--            </button>-->
<!--            <button v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">-->
<!--                <a href="#" v-on:click.prevent="changePage(page)">{{ page }}</a>-->
<!--            </button>-->
<!--            <button v-if="pagination.current_page < pagination.last_page">-->
<!--                <a href="#" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">-->
<!--                    <span aria-hidden="true">»</span>-->
<!--                </a>-->
<!--            </button>-->
<!--        </div>-->
<!--    </nav>-->
    <div class="row mt-5" style="width: 100%;">
        <div class="col text-center">
            <div class="block-27">
                <ul>
<!--                    <li  :class="{ disabled: pagination.current_page <= 1 }">-->
<!--                        <a href="#" @click.prevent="changePage(1)"  >First page</a>-->
<!--                    </li>-->
                    <li :class="{ disabled: pagination.current_page <= 1 }">
                        <a href="#" v-if="pagination.current_page > 1"
                           v-on:click.prevent="changePage(pagination.current_page - 1)">&lt;</a>
                    </li>
                    <li v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">
                        <a href="#" v-on:click.prevent="changePage(page)">{{ page }}</a>
                    </li>

                    <li :class="{ disabled: pagination.current_page >= pagination.last_page }">
                        <a href="#" v-if="pagination.current_page < pagination.last_page" v-on:click.prevent="changePage(pagination.current_page + 1)">&gt;</a>
                    </li>
<!--                    <li  :class="{ disabled: pagination.current_page >= pagination.last_page }">-->
<!--                        <a href="#" @click.prevent="changePage(pagination.last_page)">Last page</a>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: {
            pagination: {
                type: Object,
                required: true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }

                var to = from + (this.offset*2);
                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
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
    }
</script>