import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView'
import LoginView from '../views/auth/LoginView'
import RegisterView from '../views/auth/RegisterView'

const routes = [
    {
        path: '/feed',
        name: 'feed',
        component: HomeView
    },
    {
        path: '/login',
        name: 'login',
        component: LoginView
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterView
    }
]

export default createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
});
