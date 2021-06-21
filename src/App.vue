<template>

  <div id="nav">
    <Myheader/>
  </div>
  <router-view/>
</template>

<script>
import Myheader from './components/header.vue'


export default {
  
    name:'home',
    data (){
        return{
        }
    },
    components:{
     Myheader,
    }
}
</script>
<style lang="scss">
  @import 'assets/css/style.css';
  .test{
     width: 600px;
    z-index: 0;
    position: absolute;
    left: 0;
    top: -50px;
        @media only screen and (max-width: 768px) {
          width: 400px;
          left: -100px;
    }
      @media only screen and (max-width: 560px) {
          width: 350px;
    }
  }
  .test_2{
    z-index: 1000;
    
    width: 400px;
    height: 400px;
    position: absolute;
    left: 0;
    bottom: 0px;
    transform: translate(120%, 30%);
  }

  #app{
    position: relative;
    z-index: 10000;
    box-shadow: 0px 0px 10px 0px black;
    height: auto;
    width: 70%;
    margin: 80px auto;
    border-radius: 20px;
    padding: 1% 4%;
    @media only screen and (max-width: 1024px) {
        width: 85%;
        height: 1350px;
    }


  }
</style>
