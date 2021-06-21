<template>
    <Myheader/>

  <div class="contact">
    <h1>this is Contact page</h1>
  </div>
</template>

<script>
import Myheader from '../components/header.vue'

    export default {
    name: 'contact',
    data(){
        return{
        click_book :false
        }
    },
    components: {
    Myheader
        },
    methods:{

    }
    }
</script>