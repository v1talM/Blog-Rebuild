/**
 * Created by vital on 2017/9/26.
 */

import Vue from 'vue'
import Vuex from 'vuex'
import common from './modules/common'
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        common
    },
    strict: debug
})

