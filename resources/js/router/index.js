import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
//  Tag
import Tags from "../pages/Tag/index.vue";
import AddTag from "../pages/Tag/add.vue";
import EditTag from "../pages/Tag/edit.vue";


// Category
import Categories from "../pages/Category/index.vue";
import AddCategory from "../pages/Category/add.vue";

// Register route array
const routes = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/tags",
            component: Tags,
            name: "tags"
        },
        {
            path: "/add-tag",
            component: AddTag,
            name: "add-tag"
        },
        {
            path: "/edit-tag",
            component: EditTag,
            name: "edit-tag"
        },
        {
            path: "/categories",
            component: Categories,
            name: "categories"
        },
        {
            path: "/category-create",
            component: AddCategory,
            name: "category-create"
        },


    ]
});
export default routes;
