<template>
  <Myheader/>
  <div class="home">
    <Inscription v-if="click_book" ></Inscription>
    <div class="home__illustration">
      <img src="../assets/img/Lawyer-bro.png"></div>
    <div class="home__content about_conntent">
        <h1 class="f">About Us</h1>
        <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page
          Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page
        </p>
        <button @click="booking">book</button>
    </div>

  </div>
  <Myfooter/>

</template>

<script>

import Inscription from '../components/Inscription.vue'
import Myfooter from '../components/footer.vue'

import Myheader from '../components/header.vue'


export default {
  name: 'about',
  data(){
    return{
      click_book :false
    }
  },
  components: {
    Inscription,
    Myheader,
      Myfooter,

    },
  methods:{
    booking:function(){
      this.click_book = true
    }
  }
}
</script>