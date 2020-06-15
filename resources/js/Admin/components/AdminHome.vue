<template>
    <div>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->

                <div class="card-body">
                   <router-view></router-view>
                </div>
                <!-- /.card-body -->


        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "AdminHome.vue"
    }
</script>

<style scoped>

</style>