<template>
    <MYnavbar/>
        <div class="features">
            <section class="hero" >
                <div class="MyContainer">
                    <div class="hero__container hero_features">
                        <h1>Le lorem ipsum est en imprimerie</h1>
                        <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page .</p>
                        <button class="secondry_GetStarted">Get started</button>
                    </div>
                </div>
            </section>
            <section class="package">
                <h2>Packed with great features</h2>
                <p class="package__paraghraphe">We make it easy to collect money for all your hard work - whether that's using a card reader, over the phone, sending digital </p>
                <div class="package__container">
                <div class="package__container__features" >
                        <div class="package__container__img">
                            <!-- <img src="../assets/img/package/appointments-dashboard 1.png" class="firstImg"> -->
                            <img src="../assets/img//package/apointments.png" class="firstImg">

                            
                        </div>
                        <div class="package__container__options right_options">
                            <h3>Manage Your Business, Staff & Customer</h3>
                            <div class="options">
                                <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.2252 0.0634766L12.1877 14.101C11.8094 14.4793 11.1959 14.4793 10.8175 14.101L4.77479 8.05821L0 12.833L9.11515 21.9483C9.74835 22.5815 10.6071 22.9372 11.5026 22.9372C12.3979 22.9372 13.2568 22.5814 13.8899 21.9483L31 4.8382L26.2252 0.0634766Z" fill="#A5EB78"/>
                                </svg>
                                <p>We make it easy to collect money for all your hard work lorem lorem lorem .</p>
                            </div>
                            <div class="options">
                                <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.2252 0.0634766L12.1877 14.101C11.8094 14.4793 11.1959 14.4793 10.8175 14.101L4.77479 8.05821L0 12.833L9.11515 21.9483C9.74835 22.5815 10.6071 22.9372 11.5026 22.9372C12.3979 22.9372 13.2568 22.5814 13.8899 21.9483L31 4.8382L26.2252 0.0634766Z" fill="#A5EB78"/>
                                </svg>
                                <p>We make it easy to collect money for all your hard work lorem lorem lorem .</p>
                            </div>
                            <div class="options">
                                <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.2252 0.0634766L12.1877 14.101C11.8094 14.4793 11.1959 14.4793 10.8175 14.101L4.77479 8.05821L0 12.833L9.11515 21.9483C9.74835 22.5815 10.6071 22.9372 11.5026 22.9372C12.3979 22.9372 13.2568 22.5814 13.8899 21.9483L31 4.8382L26.2252 0.0634766Z" fill="#A5EB78"/>
                                </svg>
                                <p>We make it easy to collect money for all your hard work lorem lorem lorem .</p>
                            </div>
                        </div>
                </div>
                </div>
            </section>

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