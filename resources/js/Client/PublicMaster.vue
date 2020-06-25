<template>
    <div>
        <NavBar/>
        <PublicHome/>
        <Loader/>
        <Footer/>
        <vue-progress-bar></vue-progress-bar>

    </div>

</template>

<script>
    import NavBar from './components/NavBar'
    import Footer from './components/Footer'
    import Loader from './components/Loader'
    import PublicHome from "./components/PublicHome";
    export default {
       components:{
           NavBar,
           Footer,
           Loader,
           PublicHome
       }
    }
</script>

<style>

</style>