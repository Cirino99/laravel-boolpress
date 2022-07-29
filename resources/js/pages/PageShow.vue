<template>
    <Page404 v-if="is404" />
    <div v-else-if="post">
        <h1>{{ post.title }}</h1>
        <h2>Written by: {{ post.user.name }}</h2>
        <h3>In category: {{ post.category.name }}</h3>
        <div class="tags">
            <span v-for="tag in post.tags" :key="tag.id" class="tag">
                {{ tag.name }}
            </span>
        </div>
        <img :src="post.image" :alt="post.title">
        <p>{{ post.content }}</p>
    </div>
</template>

<script>
import Page404 from './Page404.vue';

export default {
    name: 'PageShow',
    components: {
        Page404,
    },
    props: {
        slug: String,
    },
    data() {
        return {
            is404: false,
            post: null
        }
    },
    created() {
        this.getPostData();
    },
    methods: {
        getPostData() {
            axios.get('/api/posts/' + this.slug)
                .then(response => {
                    console.log(response);
                    console.log(this.slug);
                    if (response.data.success) {
                        this.post = response.data.result;
                    } else {
                        this.is404 = true;
                    }
                })
                .catch(error => console.log('errore!!!!!'));
        }
    }
}
</script>

<style lang="scss" scoped>

</style>