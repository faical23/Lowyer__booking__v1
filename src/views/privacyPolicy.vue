<template>
    <MYnavbar/>
        <div class="PrivacyPolicy">
            this is PrivacyPolicy page
        </div>
    <MYfooter/>
</template>



<script>
import MYnavbar from '../components/header.vue'
import MYfooter from '../components/footer.vue'

export default {
    name:'PrivacyPolicy',
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