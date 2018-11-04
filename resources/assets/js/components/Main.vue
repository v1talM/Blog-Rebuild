<template>
    <div id="fh5co-main-content">
        <div class="fh5co-post">
            <div class="fh5co-entry padding" v-for="article in articles" @mouseover="preview(article)">
                <div class="thumb" :style="{backgroundImage: 'url(' + hosts + article.thumbnail + ')'}">

                </div>

                <div>
                    <span class="fh5co-post-date">{{ article.published_at }} -
                        <a :href="article.category.slug">{{ article.category.description }}</a>
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
    import {mapState} from 'vuex'
    import {hosts} from '../env'
    export default {
        props: ['articles'],
        computed: mapState({
            previewThumb: state => state.common.previewThumb
        }),
        data () {
            return {
                posts: [],
                hosts: hosts
            }
        },
        methods: {
            preview (article) {
                let thumb = article.thumbnail
                if (thumb == this.previewThumb)
                {
                    return false
                }
                else
                {
                    this.$store.dispatch('setPreviewThumb', thumb)
                }
            }
        }
    }
</script>

<style>
    .fh5co-post .fh5co-entry > div p:last-child{
        height: 4.22em;
        overflow: hidden;
    }
    .fh5co-post .fh5co-entry > div.thumb {
        float: right;
        width: 10%;
        margin-bottom: 30px;
        border-radius: 50%;
        background-position: center center;
        background-size: cover;
    }
    .fh5co-post .fh5co-entry > div.thumb:before{
        content: '';
        padding: 50% 0;
        display: inline-block;
    }
</style>