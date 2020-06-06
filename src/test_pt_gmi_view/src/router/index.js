import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const ifAuthenticated = (to, from, next) => {
    if (localStorage.getItem('token')) {
        next();
        return;
    }
    router.push({
        name: 'login',
    });
};

const routes = [{
        path: '/',
        name: 'Home',
        component: Home,
        beforeEnter: ifAuthenticated
    },
    {
        path: '/category',
        name: 'Category',
        beforeEnter: ifAuthenticated,
        component: () =>
            import ('../views/Category.vue')
    },
    {
        path: '/log',
        name: 'Log',
        beforeEnter: ifAuthenticated,
        component: () =>
            import ('../views/Log.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: () =>
            import ('../views/Login.vue')
    },
]




const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes


})


export default router