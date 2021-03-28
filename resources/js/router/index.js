import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView'
import LoginView from '../views/auth/LoginView'
import RegisterView from '../views/auth/RegisterView'
import store from '../store'

const routes = [
    {
        path: '/feed',
        name: 'feed',
        component: HomeView
    },
    {
        path: '/login',
        name: 'login',
        component: LoginView,
        meta: {
            requiresAuth: false
        },
        beforeEnter: (to, from, next) => {
            if (store.getters.isAuthenticated) {
                next({name: 'feed'})
                return
            }
            next()
        }
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterView,
        meta: {
            requiresAuth: false
        },
        beforeEnter: (to, from, next) => {
            if (store.getters.isAuthenticated) {
                next({name: 'feed'})
                return
            }
            next()
        }
    }
]


let router = createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isAuthenticated) {
            next()
            return
        }
        next('/login')
    } else {
        next();
    }
});

export default router;
