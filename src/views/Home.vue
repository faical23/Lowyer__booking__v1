<template>
  <div class="home">
    <Inscription v-if="click_book" ></Inscription>
    <div class="home__content">
        <h1 class="f">The right lawyer</h1>
        <h1> makes all differnce</h1>
        <p>texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles</p>
        <button @click="booking">book</button>
    </div>
    <div class="home__illustration">
        <img src="../assets/img/female_lowyer.jpg">
    </div>
  </div>
  <div class="footer">
    <section class="sociel-media">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-instagram"></a>
    </section>
  </div>
</template>

<script>

import Inscription from '../components/Inscription.vue'



export default {
  name: 'Home',
  data(){
    return{
      click_book :false,
    }
  },
  components: {
    Inscription
    },
  methods:{
    booking:function(){
      this.click_book = true
    }
  }
}
</script>
