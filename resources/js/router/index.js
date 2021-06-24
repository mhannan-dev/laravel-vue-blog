import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Home from "../pages/home.vue";
import CategoryList from "../pages/category/index.vue";
import CategoryCreate from "../pages/category/create.vue";
import CategoryEdit from "../pages/category/edit.vue";
//Posts
import PostList from "../pages/post/Index.vue";
import PostCreate from "../pages/post/Create.vue";
import PostEdit from "../pages/post/Edit.vue";
//Products
import ProductList from "../pages/product/Index.vue";
import ProductCreate from "../pages/product/Create.vue";
import ProductEdit from "../pages/product/Edit.vue";


// Register route array
const routes = new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Home },
        { path: "/category-create", component: CategoryCreate },
        { path: "/category-list", component: CategoryList },
        { path: "/category/edit/:slug", component: CategoryEdit, name: 'category-edit'},
        //Post
        { path: "/post-list", component: PostList, name: 'post-list' },
        { path: "/post-create", component: PostCreate },
        { path: "/post-edit", component: PostEdit, name: 'post-edit' },
        //Products
        { path: "/product-list", component: ProductList, name: 'product-list' },
        { path: "/product-create", component: ProductCreate },
        { path: "/product-edit", component: ProductEdit, name: 'product-edit' },
    ]
});

export default routes;
