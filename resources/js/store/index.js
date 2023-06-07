import axios from 'axios';
const state = {
    chatKey: "",
    is_host_online: false,
    hosts: [],
};

const mutations = {
    updateChatKey(state, payload) {
        state.chatKey = payload;
       
    },
    setAllHosts(state, payload) {
        state.hosts = payload.filter(node=> node.is_online===1);
       
    },
    setHostOnline(state, payload) {
        state.hosts = state.hosts.user.filter(node=> node.is_online===payload);
    },
};

const actions = {
    updateHostStatus({ commit }, data) {
		return new Promise((resolve) => {
			axios.post('/user/status/' + data.user_id, {
				is_online: data.is_online,
				user_id: data.user_id,
			})
				.then((resp) => {
					commit('setHostOnline', data.is_online);
					
				}).then(() => {
					resolve();
				});
		});
	},
};

const getters = {
    getChatKey(state) {
        return state.chatKey;
    },
    getHostStatus(state) {
        return state.is_host_online;
    },
};

export { state, mutations, actions, getters };
