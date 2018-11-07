<template>
    <footer>
        <div>
            Copyright &copy; 2016 - {{ date.getFullYear() }}, Code by <a target="_blank" href="https://github.com/v1talM">アスミタ丶</a>. All Rights Reserved. Made with <a href="#">❤</a> Powered by <a
                target="_blank"  href="https://laravel.com/">Laravel</a> &amp; <a target="_blank" href="https://vuejs.org">Vue.js</a>
        </div>
    </footer>
</template>

<script>
    export default {
        data () {
            return {
                date: new Date()
            }
        }
    }
</script>
