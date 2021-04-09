import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView'
import LoginView from '../views/auth/LoginView'
import RegisterView from '../views/auth/RegisterView'
import ProfileView from '../views/user/ProfileView.vue'
import ProjectView from '../views/project/ProjectView.vue'
import MembersView from '../views/project/MembersView.vue'
import CreateView from '../views/project/CreateView.vue'
import store from '../store'
import NProgress from 'nprogress'

const routes = [
    {
        path: '/',
        name: 'feed',
        alias: '/feed',
        component: HomeView
    },

    // Authentication

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

    // User

    {
        path: '/user/:id',
        name: 'profile',
        component: ProfileView,
        meta: {
            requiresAuth: false
        }
    },

    // Project

    {
        path: '/project/:id',
        name: 'project',
        component: ProjectView,
        meta: {
            requiresAuth: false
        },
        children: [
            {
                path: 'members',
                name: 'project.members',
                component: MembersView
            }
        ]
    },
    {
        path: '/project/create',
        name: 'project.create',
        component: CreateView,
        meta: {
            requiresAuth: true
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

router.beforeResolve((to, from, next) => {
    if (to.path) {
        NProgress.start()
    }
    next()
});

router.afterEach((to, from, next) => {
    setTimeout(() => NProgress.done(), 500);
});

export default router;
