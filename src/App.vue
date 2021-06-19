<template>

  <div id="nav">
    <Myheader></Myheader>
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
     Myheader
    }
}
</script>
<style lang="scss">
  @import 'assets/css/style.css';
  .test{
    z-index: 0;
    
    width: 600px;
    height: 600px;
    position: absolute;
    left: 0;
    top: -50px;
  }
  // .test_2{
  //   z-index: 100000;
    
  //   width: 400px;
  //   height: 400px;
  //   position: absolute;
  //   right: 0;
  //   bottom: 0px;
  // }
  body{
    // background: #a0f2f5;
    height: 100vh;
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
    @media only screen and (max-width: 768px) {
        width: 85%;
    }

  }
</style>
