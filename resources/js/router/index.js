import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView'
import LoginView from '../views/auth/LoginView'
import RegisterView from '../views/auth/RegisterView'
import ProfileView from '../views/user/ProfileView.vue'
import ProjectView from '../views/project/ProjectView.vue'
import store from '../store'

const routes = [
    {
        path: '/',
        name: 'feed',
        alias: '/feed',
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
    },
    {
        path: '/user/:id',
        name: 'profile',
        component: ProfileView,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/project/:id',
        name: 'project',
        component: ProjectView,
        meta: {
            requiresAuth: false
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
