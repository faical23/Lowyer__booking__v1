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
        <button>Book</button>
    </div>  

  </div>
</template>

<script>

export default {
  name: 'navbar',
  components: {
  }
}
</script>