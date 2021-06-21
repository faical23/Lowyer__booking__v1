import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Contact from '../views/Contact.vue'
import faq from '../views/faq.vue'
import pricing from '../views/pricing.vue'
import PrivacyPolicy from '../views/privacyPolicy.vue'
import features from '../views/features.vue'


features 
const routes = [

  {
    path: '/',
    redirect: '/home',
    component: Home
  },
  {
    path: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    component: About
  },
  {
    path: '/contact',
    name: 'contact',
    component: Contact
  }
  ,
  {
    path: '/faq',
    name: 'faq',
    component: faq,
  }
  ,
  {
    path: '/pricing',
    name: 'pricing',
    component: pricing,
  }
  ,
  {
    path: '/PrivacyPolicy',
    name: 'PrivacyPolicy',
    component: PrivacyPolicy ,
  }
  ,
  {
    path: '/features',
    name: 'features',
    component: features ,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
