import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Tag from '../pages/TagList.vue'

// Register route array
const routes = new VueRouter({
    mode: "history",
    routes: [{
            path: "/tags",
            component: Tag,
            name: 'tags'
        }
    ]
});
export default routes;
