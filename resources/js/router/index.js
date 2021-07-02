import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Tags from "../pages/index.vue";

// Register route array
const routes = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/tags",
            component: Tags,
            name: "tags"
        }
    ]
});
export default routes;
