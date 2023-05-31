const state = {
    chatKey: "",
};

const mutations = {
    updateChatKey(state, payload) {
        state.chatKey = payload;
    },
};

const actions = {};

const getters = {
    getChatKey(state) {
        return state.chatKey;
    },
};

export { state, mutations, actions, getters };
