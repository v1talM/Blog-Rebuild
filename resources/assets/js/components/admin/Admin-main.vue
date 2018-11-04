<template>
    <main class="admin-main">
        <article class="larg">

        </article>
    </main>
</template>

<script>
    export default {
        name: "Admin-main"
    }
</script>

<style scoped lang="css">
    main.admin-main {
        flex:1;
        -webkit-flex:1;
        -ms-flex:1;
    }


    main.admin-main .larg {
        max-width: 960px;
        margin: 30px auto;
        padding: 0 30px;
    }
    main.admin-main .larg div {
        background-color: #F7F7F7;
        border: 1px solid #E2E2E2;
        padding: 0 20px;
        margin: 15px 0;
    }
    main.admin-main .larg div:hover {
         background-color:#fafafa;
     }

    main.admin-main .larg h3 span {
        font-family: 'entypo';
        font-size: 19px;
        position: absolute;
        right: 0;
        transition: all .6s;
    }
    main.admin-main .close {
         -webkit-transform:rotate(180deg);
         transition:all .5s;
    }


    main.admin-main .larg p {
          display:none;
          margin-left:10px;
          padding:0 15px;
          border-left:1px solid #ccc;
    }
</style>