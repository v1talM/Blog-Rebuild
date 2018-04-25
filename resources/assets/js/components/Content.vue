<template>
    <div id="fh5co-main-content">
        <div class="fh5co-post">
            <div class="fh5co-post-content">
                <h3 class="fh5co-post-date">{{ date }}</h3>
                <h3 class="fh5co-post-title">{{ title }}</h3>
                <a :href="category" class="fh5co-post-excerpt">{{ excerpt }}</a>
                <hr class="divider">
                <div class="fh5co-content" v-html="content">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Content",
        props: ['date', 'title', 'excerpt', 'category', 'content', 'read']
    }
</script>

<style>
    .fh5co-post-content {
        padding: 4rem 3rem;
    }
    .fh5co-post-title {
        margin-top: 3rem;
        font-size: 5rem;
        font-weight: 700;
    }
    .fh5co-post-excerpt {
        font-size: 1.6rem;
        font-weight: 500;
        color: #FC5185;
    }
    hr.divider {
        width: 61.8%;
        margin-left: 0;
        border-top: 3px solid #cccccc;
    }
    img {
        width: 100% !important;
    }

</style>