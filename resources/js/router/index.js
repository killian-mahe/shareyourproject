import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView'

const routes = [
    {
        path: '/feed',
        name: 'feed',
        component: HomeView
    }
]

export default createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
});
