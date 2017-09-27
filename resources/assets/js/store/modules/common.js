/**
 * Created by vital on 2017/9/26.
 */
const state = {
    previewThumb: null,
}

const mutations = {
    set_preview_thumb (state, thumb) {
        state.previewThumb = thumb
    }
}

const actions = {
    setPreviewThumb ({commit}, thumb) {
        commit('set_preview_thumb', thumb)
    }
}

export default {
    state, mutations, actions
}