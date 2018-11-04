<template>
    <div class="site__wrapper">
        <div class="site__info">
            <p>Between heaven and earth, every single step of ours is at full throttle,  </p>
            <p>While every single road is twisting and turning.</p>
            <a href="/admin/article/create">创建文章</a>
        </div>
        <div class="grid" v-for="(article, index) in articles">
            <div class="card">
                <div class="card__image">
                    <img :src="getBg(index)" alt="">

                    <div class="card__overlay" :class="style[index % 2]">
                        <div class="card__overlay-content">
                            <ul class="card__meta">
                                <li><a :href="'article/' + article.id + '/edit'"><i class="fa fa-tag"></i> {{ article.category.description }}</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i> {{ article.published_at }}</a></li>
                            </ul>

                            <a :href="'article/' + article.id + '/edit'" class="card__title">{{ article.title }}</a>

                            <ul class="card__meta card__meta--last">
                                <li><a href="javascript:void(0)"><i class="fa fa-user"></i> Mithicher</a></li>
                                <li><a href="javascript:void(0)" @click="deleteArticle(article.id)"><i class="fa fa-facebook-square"></i> 删 除</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div><!-- @end site__wrapper -->

</template>

<script>
    export default {
        name: "Article-list",
        props: ['articles'],
        data () {
          return {
              style: ['card__overlay--blue', 'card__overlay--indigo'],

          }
        },
        methods: {
            getBg (index) {
                let url = 'https://unsplash.it/400'
                let rand = Math.round(Math.random() * 400);
                if ((index) % 5 == 0) {
                    return url + '/608?image=' + rand;
                }
                return url + '/300?image=' + rand;
            },
            deleteArticle (id) {
                axios.delete('/admin/article/' + id, {}).then(res => {
                    let data = res.data
                    if (data.status == 'success') {
                        window.location.reload()
                    }
                }).catch(err => {

                })
            }
        }
    }
</script>

<style scoped lang="scss">

    // Color Variables
$indigo: #5C6BC0;
    $blue: #29B6F6;
    $black: #717171;

    $body-font-family: "Lato";
    $header-font-family: "Montserrat";

    // Basic Styles for Demo
       *,*:after,*:before {
           -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
           box-sizing: border-box;
           margin: 0;
           padding: 0;
       }

    html {
        font-size: 100%;
    }

    body {
        font-size: 1em;
        font-family: $body-font-family;
        font-weight: 400;
        line-height: 1.5;

        word-wrap: break-word;
        -webkit-hyphens: auto;
        -moz-hyphens: auto;
        hyphens: auto;
    }

    img {
        height: auto;
        max-width: 100%;
    }

    a {
        color: $blue;
        text-decoration: none;

    &:hover {
         text-decoration: underline;
     }
    }

    // Basics demo styles
       .site__wrapper {
           max-width: 1000px;
           margin-left: auto;
           margin-right: auto;
           overflow: hidden;
           padding-top: 1.5em;
           padding-bottom: 1.5em;
       }

    .site__info {
        clear: both;
        display: block;
        font-variant: small-caps;
        letter-spacing: 2px;
        padding-top: 1.5em;
        padding-bottom: 1.5em;
        text-align: center;
    }

    // Basic Grid for Demo;
    .grid {
        float: none;
        width: 100%;
        padding-left: 0.2em;
        padding-right: 0.2em;
        padding-bottom: 0.4em;

    @media screen and (min-width: 40.063em) {
        float: left;
        width: 32.6%;
    }
    }

    // Card Article
       .card {

       }

    .card__image {
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        display: block;
        min-height: 240px;
        overflow: hidden;
        position: relative;

    > img {
        display: block;
        margin-bottom: 0;

        -webkit-transition: all .25s ease-in-out;
        -moz-transition: all .25s ease-in-out;
        -ms-transition: all .25s ease-in-out;
        -o-transition: all .25s ease-in-out;
        transition: all .25s ease-in-out;
    }

    &:hover > img {
         -webkit-transform: scale(1.2);
         -moz-transform: scale(1.2);
         -ms-transform: scale(1.2);
         -o-transform: scale(1.2);
         transform: scale(1.2);
     }
    }

    .card__title {
        color: white;
        display: inline-block;
        font-family: $header-font-family;
        font-size: 1.5em;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 0.75em;
        text-decoration: none;

        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;

    &:hover {
         color: rgba(white, 0.7);
         text-decoration: none;
     }
    }

    .card__overlay {
        content: "";
        bottom: 0;
        display: block;
        height: 100%;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    .card__overlay--indigo {
        background-image: linear-gradient(to bottom, rgba($indigo, 0.1), rgba($indigo, 0.8));
        z-index: 2;
    }

    .card__overlay--blue {
        background-image: linear-gradient(to bottom, rgba($blue, 0.1), rgba($blue, 0.8));
        z-index: 2;
    }

    .card__overlay-content {
        position: absolute;
        bottom: 0;
        padding: 1.5em;
        z-index: 3;
    }

    .card__meta {
        margin: 0;
        margin-right: -1em;
        margin-bottom: 0.75em;

    &.card__meta--last {
         margin-bottom: 0;
     }

    li {
        color: #f8f8f8;
        display: inline;
        list-style-type: none;
        margin-bottom: 0;
        padding-right: 1em;

        font-size: 0.85em;
        font-variant: small-caps;
        letter-spacing: 1px;

    &:not(:last-child):after {
         content: "\25cf";
         font-style: normal;
         position: relative;
         color: rgba(white, 0.25);
         right: -0.6em;
     }

    > a {
        color: #f8f8f8;
    }
    }
    }

</style>