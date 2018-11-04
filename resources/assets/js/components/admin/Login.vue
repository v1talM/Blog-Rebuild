<template>
    <form class="login-form">
        <div class="group">
            <input v-model="email" type="text"><span class="highlight"></span><span class="bar"></span>
            <label>邮 箱</label>
        </div>
        <div class="group">
            <input v-model="password" type="password"><span class="highlight"></span><span class="bar"></span>
            <label>密 码</label>
        </div>
        <button type="button" class="button buttonBlue" @click="login">登 录
            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
        </button>
    </form>
</template>

<script>
    import {admin} from '../../env'
    export default {
        props: ['loginUrl'],
        data () {
            return {
                email: null,
                password: null
            }
        },
        methods: {
            login () {
                let email = this.email
                let password = this.password
                axios.post(this.loginUrl, {
                    email: email,
                    password: password,
                }).then(function(response){
                    let res = response.data
                    if (res.auth)
                        window.location = admin
                }).catch(function (error) {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped lang="css">

    form.login-form {
        width: 380px;
        margin: 8em auto;
        padding: 3em 2em 2em 2em;
        background: #fafafa;
        border: 1px solid #ebebeb;
        box-shadow: rgba(0,0,0,0.14902) 0px 1px 1px 0px,rgba(0,0,0,0.09804) 0px 1px 2px 0px;
    }

    .login-form .group {
        position: relative;
        margin-bottom: 45px;
    }

    .login-form input {
        font-size: 18px;
        padding: 10px 10px 10px 5px;
        -webkit-appearance: none;
        display: block;
        background: #fafafa;
        color: #636363;
        width: 100%;
        border: none;
        border-radius: 0;
        border-bottom: 1px solid #757575;
    }

    .login-form input:focus { outline: none; }


    /* Label */

    .login-form label {
        color: #999;
        font-size: 18px;
        font-weight: normal;
        position: absolute;
        pointer-events: none;
        left: 5px;
        top: 10px;
        transition: all 0.2s ease;
    }


    /* active */

    .login-form input:focus ~ label, input.used ~ label {
        top: -20px;
        transform: scale(.75); left: -2px;
        /* font-size: 14px; */
        color: #4a89dc;
    }


    /* Underline */

    .login-form .bar {
        position: relative;
        display: block;
        width: 100%;
    }

    .login-form .bar:before, .bar:after {
        content: '';
        height: 2px;
        width: 0;
        bottom: 1px;
        position: absolute;
        background: #4a89dc;
        transition: all 0.2s ease;
    }

    .login-form .bar:before { left: 50%; }

    .login-form .bar:after { right: 50%; }


    /* active */

    .login-form input:focus ~ .bar:before, input:focus ~ .bar:after { width: 50%; }


    /* Highlight */

    .login-form .highlight {
        position: absolute;
        height: 60%;
        width: 100px;
        top: 25%;
        left: 0;
        pointer-events: none;
        opacity: 0.5;
    }


    /* active */

    .login-form input:focus ~ .highlight {
        animation: inputHighlighter 0.3s ease;
    }


    /* Animations */

    @keyframes inputHighlighter {
        from { background: #4a89dc; }
        to 	{ width: 0; background: transparent; }
    }


    /* Button */

    .login-form .button {
        position: relative;
        display: inline-block;
        padding: 12px 24px;
        margin: .3em 0 1em 0;
        width: 100%;
        vertical-align: middle;
        color: #fff;
        font-size: 16px;
        line-height: 20px;
        -webkit-font-smoothing: antialiased;
        text-align: center;
        letter-spacing: 1px;
        background: transparent;
        border: 0;
        border-bottom: 2px solid #3160B6;
        cursor: pointer;
        transition: all 0.15s ease;
    }
    .login-form .button:focus { outline: 0; }


    /* Button modifiers */

    .login-form .buttonBlue {
        background: #4a89dc;
        text-shadow: 1px 1px 0 rgba(39, 110, 204, .5);
    }

    .login-form .buttonBlue:hover { background: #357bd8; }


    /* Ripples container */

    .login-form .ripples {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: transparent;
    }


    /* Ripples circle */

    .login-form .ripplesCircle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.25);
    }

    .login-form .ripples.is-active .ripplesCircle {
        animation: ripples .4s ease-in;
    }


    /* Ripples animation */

    @keyframes ripples {
        0% { opacity: 0; }

        25% { opacity: 1; }

        100% {
            width: 200%;
            padding-bottom: 200%;
            opacity: 0;
        }
    }


</style>