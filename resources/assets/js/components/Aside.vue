<template lang="html">
    <div id="fh5co-aside" :style="{backgroundImage: 'url(' + bg + ')'}">
        <div class="overlay"></div>
        <nav role="navigation">
            <ul>
                <li><a :href="homeRoute"><i class="icon-home"></i></a></li>
                <li><a href="/WebGL"><i class="icon-heart"></i></a></li>
                <!--<li><a href="#" v-for="cate in categories">{{ cate.name }}</a></li>-->
            </ul>
        </nav>
        <div class="featured">
            <span></span>
            <h2>{{ intro }}</h2>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import {hosts} from '../env'
    export default {
        computed: mapState({
            previewThumb: state => state.common.previewThumb
        }),
        data () {
            return {
                bg: null
            }
        },
        watch: {
            previewThumb () {
                this.bg = hosts + this.previewThumb
            }
        },
        mounted () {
            this.bg = this.background
        },
        props:['homeRoute', 'intro', 'background', 'categories']
    }
</script>


