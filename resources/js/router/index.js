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
import EditCategory from "../pages/Category/edit.vue";
// Blogs
import Blogs from "../pages/Blog/index.vue";
import AddBlog from "../pages/Blog/add.vue";
import EditBlog from "../pages/Blog/edit.vue";

//Test Vuex
import useComp from '../vuex/useComp'
// Register route array
const routes = new VueRouter({
    mode: "history",
    routes: [
        //Test
        {
            path: "/testVuex",
            component: useComp,
            name: "te"
        },
        //Test
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
        {
            path: '/category/edit/:id',
            component: EditCategory,
            name: 'edit-category',
        },
        //Blogs
        {
            path: "/blogs",
            component: Blogs,
            name: "blogs"
        },
        {
            path: "/blog-create",
            component: AddBlog,
            name: "blog-create"
        },
        {
            path: '/blog/edit/:id',
            component: EditBlog,
            name: 'edit-blog',
        },


    ]
});
export default routes;
