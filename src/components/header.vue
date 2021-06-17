<template>
  <div class="navbar">
            <router-link to="/home" tag="li" >
                <a>Home</a>
          </router-link>
            <router-link to="/about" tag="li" >
                <a>About</a>
          </router-link>
            <router-link to="/contact" tag="li" >
                <a>Contact</a>
          </router-link>
  </div>
</template>

<script>

export default {
  name: 'navbar',
  components: {
  }
}
</script>