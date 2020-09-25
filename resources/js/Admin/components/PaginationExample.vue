<template>
<nav aria-label="Page navigation">
    <ul class="pagination">
        <span class="page-stats">{{pagination.from}} - {{pagination.to}} of {{pagination.total}}</span>
        <a href="" v-if="pagination.prevPageUrl" class="button is-smaill pagination-previos" @click="$emit('prev');">
            Prev
        </a>
        <a href="" class="button is-small pagination-previos" v-else :disabled="true">
            Prev
        </a>
        <a href="" v-if="pagination.nextPageUrl" class="button is-smaill pagination-previos" @click="$emit('next');">
            Next
        </a>
        <a href="" class="button is-small pagination-next" v-else :disabled="true">
            Next
        </a>
    </ul>

</nav>
</template>
<script>
    export default {
        props: ['pagination']
    }
</script>
<style lang="scss">
    .pagination {
        justify-content: flex-end !important;
        .page-stats {
            align-items: center;
            margin-right: 5px;
        }
    }
    i{
        color: #3273dc !important;
    }
</style>
