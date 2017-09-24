<template lang="html">
    <div id="fh5co-aside" :style="{backgroundImage: 'url(' + background + ')'}">
        <div class="overlay"></div>
        <nav role="navigation">
            <ul>
                <li><a :href="homeRoute"><i class="icon-home"></i></a></li>
            </ul>
        </nav>
        <div class="featured">
            <span></span>
            <h2>{{ intro }}</h2>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props:['homeRoute', 'intro', 'background']
    }
</script>


