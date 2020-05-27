<template>
    <div>
        <NavBar/>
        <router-view>

        </router-view>
        <Loader/>
        <Footer/>

    </div>

</template>

<script>
    import NavBar from './_layout/NavBar'
    import Footer from './_layout/Footer'
    import Loader from './_layout/Loader'
    export default {
       components:{
           NavBar,
           Footer,
           Loader
       }
    }
</script>

<style>

</style>