<template>
    <div>
        <h1 class="text-center mb-4">Boolpress</h1>
        <div class="row g-2">
            <CardPost v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        <nav aria-label="Page navigation" class="mt-3">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" @click="getPostsData(--currentPage)">
                        <span aria-hidden=" true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#" @click="getPostsData(currentPage)">{{
                        currentPage
                }}</a>
                </li>
                <li class="page-item"><a class="page-link" href="#" @click="getPostsData(++currentPage)">{{
                        1 + currentPage
                }}</a>
                </li>
                <li class=" page-item"><a class="page-link" href="#" @click="getPostsData(2 + currentPage)">{{
                        2 + currentPage
                }}</a></li>
                <li class=" page-item">
                    <a class="page-link" href="#" aria-label="Next" @click="getPostsData(++currentPage)">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import CardPost from '../components/CardPost.vue';

export default {
    name: 'PageBlog',
    components: {
        CardPost,
    },
    data() {
        return {
            posts: [],
            currentPage: 1
        }
    },
    created() {
        this.getPostsData(1);
    },
    methods: {
        getPostsData(page) {
            axios.get('/api/posts?page=' + page)
                .then(response => {
                    this.posts = response.data.result.data;
                    this.currentPage = response.data.result.current_page;
                    console.log(response);
                })
                .catch(error => console.log('errore!!!!!'));
        }
    }
}
</script>

<style lang="scss" scoped>

</style>