<template>
    <div class="wrapper">
<Header/>

        <SideBar/>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Client header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Starter Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                        <AdminHome/>
                </div>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <Footer/>

    </div>
    <!-- ./wrapper -->
</template>
<script>
    import Header from './components/Header';
    import SideBar from './components/SideBar.vue';
    import Footer from './components/Footer.vue';
    import AdminHome from "./components/AdminHome";
    export default {
        components:{
            Header,
            SideBar,
            Footer,
            AdminHome
        }
    }
</script>