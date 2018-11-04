/**
 * Created by vital on 2017/9/26.
 */
const state = {
    previewThumb: null,
    adminNav: null,
}

const mutations = {
    set_preview_thumb (state, thumb) {
        state.previewThumb = thumb
    },
    set_admin_nav (state, nav) {
        state.adminNav = nav
    }
}

const actions = {
    setPreviewThumb ({commit}, thumb) {
        commit('set_preview_thumb', thumb)
    },
    setAdminNav ({commit}, nav) {
        commit('set_admin_nav', nav)
    }
}

export default {
    state, mutations, actions
}