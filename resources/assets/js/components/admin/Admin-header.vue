<template>
    <div>
        <span class="bckg"></span>
        <header class="admin-header">
            <h1><a href="/">アスミタ丶</a></h1>
            <nav>
                <ul>
                    <li v-for="(url, name) in navigate">
                        <a :href="url" :data-title="name">{{ name }}</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    export default {
        props: ['nav'],
        computed: mapState({
            adminNav: state => state.common.adminNav
        }),
        data () {
            return {
                navigate: null,
            }
        },
        mounted () {
            let nav = this.nav
            if (typeof(nav) != 'undefined') {
                this.navigate = nav
                this.$store.dispatch('setAdminNav', this.nav)
                window.localStorage.setItem('adminNav', JSON.stringify(nav))
            } else {
                let stored = window.localStorage.getItem('adminNav')
                this.navigate = JSON.parse(stored)
            }
        }
    }
</script>

<style scoped lang="css">
    header.admin-header h1 {
        text-align: center;
        font-weight: normal;
        color: #F6F6EF;
        line-height:60px;
        margin:0;
        font-size:20px;
        letter-spacing:2px;
        background-color:#34363A;
        border-bottom:1px solid rgba(101, 116, 134, 0.57);
    }
    header.admin-header h2 {
        font-size: 20px;
        text-transform: uppercase;
        margin: 0;
        letter-spacing: 3px;
        color: #919191;
        font-weight: normal;
        padding-left: 40px;
        line-height: 60px;
        text-shadow: 1px 1px 2px #fff;
        position: relative;
        flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
    }
    header.admin-header h2:before {
         content:'';
         width: 36px;
         height: 36px;
         position: absolute;
         left: -19px;
         top: 12px;
         background-color:#34363A;
         -webkit-transform:rotate(45deg);
         -moz-transform:rotate(45deg);
         transform:rotate(45deg);
    }
    header.admin-header h3 {
        font-size:17px;
        margin:0;
        line-height: 40px;
        color: #555;
        cursor:pointer;
        position:relative;
    }

    header.admin-header {
        width: 200px;
        height: 100%;
        float: left;
        position: relative;
        z-index: 99;
    }
    header.admin-header nav ul {
        list-style:none;
        margin-top:0;
        padding:0;
    }
    header.admin-header nav ul li {
        border-bottom: 1px solid #42454D;
        padding-left: 48px;
        transition: all 0.6s;
        border-top: 1px solid #2E3036;
    }
    header.admin-header nav ul li:hover {
         background-color: #454952;
         transition: all 0.6s;
         border-bottom: 1px solid #797979;
     }

    header.admin-header nav ul li:hover a {
         color:#fff;
         transition:all 0.6s;
    }

    header.admin-header a {
        line-height: 55px;
        font-size: 18px;
        position: relative;
        letter-spacing: 1px;
        transition: all 0.6s;
    }
    header.admin-header a:before {
         font-family: 'entypo', sans-serif;
         font-size:20px;
         position:absolute;
         left:-32px;
     }
    .bckg {
        background-color:#383B42;
        box-shadow:-4px 0px 10px rgba(14, 14, 14, 0.48) inset;
        width:200px;
        height:100%;
        position:fixed;
        left:0;
        top:0;
    }
    .header.admin-header nav ul li:first-child a:before {content:"\268f";}
    .header.admin-header nav ul li:nth-child(2) a:before {content:"\1f465";}
    .header.admin-header nav ul li:nth-child(3) a:before {content:"\1f4c5";}
    .header.admin-header nav ul li:nth-child(4) a:before {content:"\e771";}
    .header.admin-header nav ul li:nth-child(5) a:before {content:"\2699";}
    .header.admin-header nav ul li:nth-child(6) a:before {content:"\1f50d";}

</style>