<template>
    <div id="fh5co-main-content">
        <div class="fh5co-post">
            <div class="fh5co-entry padding" v-for="article in articles">
                <img :src="'http://blog.sparki.cn' + article.thumbnail" :alt="article.title">
                <div>
                    <span class="fh5co-post-date">{{ article.published_at }} -
                        <a :href="article.category.slug">{{ article.category.slug }}</a>
                    </span>
                    <h2><a v-bind:href="'article/' + article.slug">{{ article.title }}</a></h2>
                    <p>{{ article.excerpt }}</p>
                </div>
            </div>
            <blog-main-footer></blog-main-footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['articles'],
        data () {
            return {
                posts: []
            }
        },
        mounted () {

        }
    }
</script>

<style>
    .fh5co-post .fh5co-entry > div p:last-child{
        height: 4.22em;
        overflow: hidden;
    }
</style>