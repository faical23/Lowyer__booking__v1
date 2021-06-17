<template>
  <div class="login">
      <form action="">
          <p> ur token is : {{Token}}</p>
          <input type="text" placeholder="token" v-model="input_token">
          <button  @click.prevent @click="valide__token" >Valide</button>
      </form>
  </div>
</template>

<script>
export default {
  name: 'login',
  data(){
    return{

    }
  }
}
</script>

