import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/fields',
      name: 'fields',
      component: () => import('../views/FieldView.vue')
    },
    {
      path: '/create-subscription',
      name: 'create subscription',
      component: () => import('../views/CreateSubscription.vue')
    },
    {
      path: '/subscriptions/:id',
      name: 'view subscription',
      component: () => import('../views/SubscriptionDetails.vue')
    }
  ]
})

export default router
