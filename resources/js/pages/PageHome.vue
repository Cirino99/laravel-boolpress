<template>
    <div>
        <h1 class="text-center mt-3">Benvenuti in Boolpress</h1>
        <div class="mb-3">
            <div class="row g-2">
                <!-- <CardPost v-for="post in posts" :key="post.id" :post="post" /> -->
                <div v-for="post in posts" :key="post.slug" class="col-sm-6 col-md-4">
                    <router-link :to="{name: 'show', params: {slug: post.slug} }">
                        <img :src="post.image" :alt="post.title" class="img-fluid">
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PageHome',
    data() {
        return {
            posts: [],
        }
    },
    created() {
        this.getPostsData();
    },
    methods: {
        getPostsData(){
            axios.get('/api/posts/random')
                .then(result => {
                    if (result.data.success) {
                        this.posts = result.data.result
                    }
                });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>