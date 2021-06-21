<template>
    <MYnavbar/>
        <div class="Pricing">
            this is Pricing page
        </div>
    <MYfooter/>
</template>



<script>
import MYnavbar from '../components/header.vue'
import MYfooter from '../components/footer.vue'

export default {
    name:'Pricing',
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