<template>
    <div class="Faq">
    <MYnavbar/>
        <section class="faq__content">
            <div class="MyContainer">
                <div class="__title">
                    <h1 class="__title_grey">Questions ...</h1>
                    <h1 class="__title_black_Faq">Have a  </h1>
                    <h1 class="__title_black_2">Look her </h1>
                </div>
                <input type="text" name="search" placeholder="Type yuor question here ..." class="Faq_input">
                <div class="faq__content__ButtonsAndQuestions">
                        <div class="faq__content__buttons">
                            <ul>
                                <li v-for="btn in btns__faq" :key="btn">
                                    <button  :class="['primary_GetStarted',{active: Active__btn === btn }]"  @click="change__faq__element(btn),Active__btn = btn">{{btn}}</button>
                                </li>
                            </ul>
                        </div>
                        <div class="faq__content__Questions">
                            <div v-for="data in faq__data" :key="data.element" class="faq__content__Questions__zone"   @click="data.open ? data.open = false :  data.open = true ">
                                <div class="faq__content__Questions__zone_single">
                                    <h3 id="head">{{data.question}}</h3>

                                    <h3  v-if="data.open == true" class="faq__content__faq_question_plus">-</h3>
                                    <h3  v-else class="faq__content__faq_question_plus">+</h3>


                                </div>
                                <p class="faq__content__faq_reponse" id="faq_res" v-if="data.open">{{data.reponse}}</p>
                            </div>
                        </div>
                </div>
                <div class="picture_before_footer">
                    <img src="../assets/img/barbersImg/allyson-carter-lmZ_JVfbmY4-unsplash.jpg">
                </div>
            </div>
        </section>
    <MYfooter/>
    </div>
</template>

<script>

import MYnavbar from '../components/header.vue'
import MYfooter from '../components/footer.vue'
import faq__data_json from "../assets/json/faq.json"

export default {
    name:'Faq',
    data (){
        return{
            btns__faq : ['General','Paiment','Carrers','Transactions','Returns'],
            faq__data : faq__data_json.faq[0]['General'],
            Active__btn : 'General',
            active__faq: false
        }
    },
    components:{
         MYnavbar, 
        MYfooter
    }
    ,
    methods:{
        change__faq__element: function(value){
            this.faq__data = faq__data_json.faq[0][value]
        }
    }
}
</script>
