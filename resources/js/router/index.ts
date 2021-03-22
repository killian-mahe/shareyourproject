import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
const routes = [] as RouteRecordRaw[]

export default createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
});
