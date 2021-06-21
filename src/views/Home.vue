<template>
    <MYnavbar/>
        <div class="home">
            this is home page
        </div>
    <MYfooter/>
</template>



<script>
import MYnavbar from '../components/header.vue'
import MYfooter from '../components/footer.vue'

export default {
    name:'home',
    data (){
        return{
        }
    },
    components :{
        MYnavbar, 
        MYfooter
    }
}
</script>