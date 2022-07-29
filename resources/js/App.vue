<template>
    <section>
        <NavBar/>
        <div class="container">
            <router-view></router-view>
        </div>
    </section>
</template>

<script>
import NavBar from './components/Nav.vue';

export default {
    name: 'App',
    components: {
    NavBar,
}
}
</script>

<style lang="scss">
@import 'bootstrap/scss/bootstrap';
</style>