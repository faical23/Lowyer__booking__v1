import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Contact from '../views/Contact.vue'
import profile from '../views/client.vue'



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
    path: '/profile',
    name: 'profile',
    component: profile,
    beforeEnter: (to, from, next) => {
      async function check__token(params){
        let rep = await fetch(`http://localhost/Lowyer__booking__v1/back_end/controlles/decodeJwt.php`,params);
        let reponse = await rep.json();
        return reponse;
      }
      check__token();
        let have__token = localStorage.getItem('jwt');
        if (have__token) {
          var params = {method:"POST",headers:{'Content-type': 'application/json'},body:JSON.stringify({'jwt':have__token})}
          let token_after_check =  check__token(params);
          token_after_check.then((res) =>{
            if(res.token == "valide"){
                next()
            }
            else{
              next('/')
            }
          })
      } else {
        next('/')
      }
    }
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
