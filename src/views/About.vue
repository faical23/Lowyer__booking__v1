<template>
  <div class="about">
    <h1>this is About page</h1>
    <button @click="booking">book</button>
    <Inscription v-if="click_book"></Inscription> 
  </div>
</template>

<script>

import Inscription from '../components/Inscription.vue'



export default {
  name: 'about',
  data(){
    return{
      click_book :false
    }
  },
  components: {
    Inscription,
    },
  methods:{
    booking:function(){
      this.click_book = true
    }
  }
}
</script>