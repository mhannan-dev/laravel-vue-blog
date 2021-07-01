import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Home from "../pages/home.vue";
import Hooks from "../pages/basic/Hooks.vue";


// Register route array
const routes = new VueRouter({
    mode: "history",
    routes: [{
            path: "/",
            component: Home,
            name: 'home'
        },
        {
            path: "/hooks",
            component: Hooks,
            name: 'hooks'
        },
    ]
});
export default routes;
