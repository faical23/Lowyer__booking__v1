<template>
  <div id="nav">
    <Inscription></Inscription>
  </div>
  <router-view/>
</template>

<script>
import Inscription from './components/Inscription.vue'
export default {
  
    name:'home',
    data (){
        return{
        }
    },
    components:{
      Inscription
    }
}
</script>
<style lang="scss">
  @import 'assets/css/style.css';
</style>
