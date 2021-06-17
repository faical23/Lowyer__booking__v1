<template>
  <div id="nav">
  <MYheader></MYheader>
  </div>
  <router-view/>
</template>

<script>
import MYheader from './components/header.vue'

export default {
  
    name:'home',
    data (){
        return{
        }
    },
    components:{
      MYheader
    }
}
</script>
<style lang="scss">
  @import 'assets/css/style.css';
</style>
