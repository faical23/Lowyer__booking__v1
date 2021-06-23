<template>
  <Myheader/>
  <div class="home contact">
    <Inscription v-if="click_book" ></Inscription>
    <div class="home__content contact_conntent">
        <h1 class="f">Fell free to Contact us</h1>

        <form action="">
            <input type="text" placeholder="Full Name" v-model="Fname">
            <input type="text" placeholder="Email" v-model="Email">
            <textarea  placeholder="Message"></textarea>
            <button>Send</button>
        </form>
    </div>
    <div class="home__illustration">
      <img src="../assets/img/Justice-bro.png">
    </div>
  </div>
  <Myfooter/>
</template>

<script>
import Myheader from '../components/header.vue'
import Myfooter from '../components/footer.vue'

    export default {
    name: 'contact',
    data(){
        return{
        click_book :false
        }
    },
    components: {
    Myheader,
    Myfooter,

        },
    methods:{

    }
    }
</script>