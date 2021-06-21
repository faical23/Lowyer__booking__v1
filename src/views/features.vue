<template>
    <MYnavbar/>
        <div class="features">
            this is features page
        </div>
    <MYfooter/>
</template>



<script>
import MYnavbar from '../components/header.vue'
import MYfooter from '../components/footer.vue'

export default {
    name:'features',
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