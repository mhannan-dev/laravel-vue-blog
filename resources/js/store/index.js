//Vuex
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
const store = new Vuex.Store({
    //Sate workd on to keep saved data
    state: {
        message: 'Welcome! beautiful people',
        user: {}
    },
    //Getter works on to send stored data
    getters: {
        getMessage(state){
            return state.message
        },
        getUser(state){
            return state.user
        }
    },
    //Saving data in vuex store
    mutations:{
        SET_USER(state, data){
            state.user = data
        }
    }
});
export default store
