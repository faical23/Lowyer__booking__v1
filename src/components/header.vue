<template>
  <div class="navbar">
    <div class="navbar__logo">
        <h1>Lowyer</h1>
    </div>
    <div class="navbar__menu">
          <router-link to="/home" tag="li" >
                Home
          </router-link>
            <router-link to="/about" tag="li" >
                About
          </router-link>
            <router-link to="/contact" tag="li" >
                Contact
          </router-link>
    </div>
    <div class="navbar__book">
        <router-link to="/profile" tag="li" v-if="user__log">
            <h2  class="user__name__navbar">{{user__name}}</h2>
        </router-link>
        <button v-else>Book</button>
    </div>  

  </div>
</template>

<script>

export default {
    data(){
    return{
      user__log: false,
      user__name : "Profile",
      jwt :localStorage.getItem('jwt'),

    }
  },
  name: 'navbar',
  components: {
  },
  props:['Fname'],
  methods:{
        fetch__methode : async function (search,params,Api){
        let rep = await fetch(`${Api + search}` , params);
        let reponse = await rep.json();
        return reponse;
      },
      check_if_is_login : function(){
        if(this.jwt){
          this.user__log = true
        }
        else{
           this.user__log = false
        }
          console.log('this is navbar')
      },
  },
  mounted(){
    this.check_if_is_login();
    // this.valide_login();
  }
}

</script>