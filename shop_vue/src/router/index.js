import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'products.index',      
      component: () => import('../views/product/Index.vue')
    },    
    {
      path: '/products/cart',
      name: 'products.cart',
      component: () => import('../views/product/Cart.vue')
    },
    {
      path: '/products/wishlist',
      name: 'products.wishlist',
      component: () => import('../views/product/Wishlist.vue')
    },
    {
      path: '/products/compare',
      name: 'products.compare',
      component: () => import('../views/product/Compare.vue')
    },    
    {
      path: '/products/:id(\\d+)',
      name: 'products.show',
      component: () => import('../views/product/Show.vue')
    },
  ]
})

export default router