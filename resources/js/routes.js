import { createWebHistory, createRouter } from "vue-router";
import login from './components/LoginComponent.vue'

import saso_dashboard from './dashboard/SasoDashboard.vue'



import cashier_dashboard from './dashboard/CashierDashboard.vue'
import clinic_dashboard from './dashboard/ClinicDashboard.vue'
import guidance_dashboard from './dashboard/GuidanceDashboard.vue'

const routes = [
    {
        path: '/login',
        name: 'Login',
        component: login,
        meta:{
            requiresAuth:false
        },
    },
    {
        path: '/saso-dashboard',
        name: 'saso-Dashboard',
        component: () => import('./dashboard/SasoDashboard.vue'),
        meta:{
            requiresAuth:true
        },
    },
    {
        path: '/cashier-dashboard',
        name: 'cashier-Dashboard',
        component: () => import('./dashboard/CashierDashboard.vue'),
        meta:{
            requiresAuth:true
        },
    },
    {
        path: '/clinic-dashboard',
        name: 'clinic-Dashboard',
        component: () => import('./dashboard/ClinicDashboard.vue'),
        meta:{
            requiresAuth:true
        },
    },
    {
        path: '/guidance-dashboard',
        name: 'guidance-Dashboard',
        component: () => import('./dashboard/GuidanceDashboard.vue'),
        meta:{
            requiresAuth:true
        },
    },
]
// Retrieve isLoggedIn from localStorage
let auth = localStorage.getItem('isLoggedIn')
let credentials = JSON.parse(localStorage.getItem('credentials'));
let isLoggedIn = auth === "true";
// If isLoggedIn is null, set it to false
if (auth === null) {
    localStorage.setItem('isLoggedIn', false);
    isLoggedIn = false;
  }
// If credentials is null, initialize it with an empty name field
if (credentials === null) {
    const cred = { "name": "" };
    localStorage.setItem('credentials', JSON.stringify(cred));
    credentials = cred;
  }
const router = createRouter({
    history:createWebHistory(),
    routes
})
router.beforeEach(async(to, from,next)=>{   
    if(to.meta.requiresAuth && auth == false){
        next({ name:"Login" })
    }else{
        console.log('where to go')
        next();
    }
})
export default router;