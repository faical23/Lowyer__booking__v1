<template>
    <div class="Inscription" v-if=" back">
        <form action="" v-if="(have__token || get__token)">
            <h3>welcome </h3>
            <p v-if="get__token" class="your__token" > ur token is : {{Token}}</p>
            <input type="text" placeholder="token" v-model="input_token">
            <p v-if="token_invalide" class="error__form">Token invalide please try again</p>
            <button class="btn__form" @click.prevent @click="valide__token" >Valide</button>
            <button class="button_token_dont_have"  @click="have__token = false , error_field = false" v-if="get__token != true">i don't have token</button>
            <button class="row__back" @click.prevent @click=" back= false">
              <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
            </button>
        </form>
        <form action="" v-else>
             <h3>Get token</h3>
             <input type="text" placeholder="First Name" v-model="Fname">
            <input type="text" placeholder="Last Name"  v-model="Lname">
            <input type="text" placeholder="Email" v-model="Email">
             <input type="text" placeholder="Phone Number" v-model="PhoneNumber">
              <p v-if="error_field" class="error__form">Error in some field</p>
            <p v-if="exist_Email" class="error__form">Email exist</p>
            <button class="btn__form"  @click.prevent @click="submit__data(),token_invalide = false">Sign up</button>
            <button class="button_token_dont_have"  @click="have__token = true , token_invalide = false">i have token</button>
            <button class="row__back" @click.prevent @click=" back= false">
              <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
            </button>
        </form>

    </div>
</template>



<script>
export default {
    name:'Inscription',
    data (){
        return{
            have__token:true,
            api :"http://localhost/Lowyer__Booking/back_end/api/Api.php",
            Fname:"",
            Lname:"",
            Email:"",
            PhoneNumber:"",
            error_field:false,
            exist_Email:false,
            get__token:false,
            Token:"",
            input_token:"",
            params : {method:"GET",headers:{'Content-type': 'application/json'}},
            token_invalide : false,
            back:true
        }
    },
    components:{
    },
    methods:{

      fetch__methode : async function (params,search){
          let rep = await fetch(`http://localhost/Lowyer__booking__v1/back_end/api/Api.php${search}` , params);
          let reponse = await rep.json();
          return reponse;
      },
      submit__data:function(){
          let search =`?Email=${this.Email}`
          let get_email = this.fetch__methode(this.params,search)
          get_email.then((result) =>{
            let exist = result.data
            if(exist != "exist email"){
              this.exist_Email= false
              let data=JSON.stringify({
                "Fname":this.Fname,
                "Lname":this.Lname,
                "PhoneNumber":this.PhoneNumber,
                "Email":this.Email})
                let params = {method:"POST",headers:{'Content-type': 'application/json'},body:data}
                this.insert__user(params)
            }
            else{
              this.exist_Email = true
              console.log(result)
            }

          })
      },
      insert__user:function(params){
          let result_fetch = this.fetch__methode(params,"")
          result_fetch.then((res) =>{
            if(res.error != "Invalide Regix"){
              this.get__token = true
              this.Token = res.Token
              this.error_field = false
            }
            else{
                this.error_field = true
            }
            console.log(res)
          })
      },
      valide__token:function(){
        let token = this.input_token
        let search =`?Token=${token}`
        let user_data = this.fetch__methode(this.params,search)
        user_data.then((result) =>{
          if(result.data == "valide token")
          {
            localStorage.setItem('jwt', result.JWT)
            console.log(result.JWT)
            this.$router.push('/profile')
            this.token_invalide = false
          }
          else{
            this.token_invalide = true

          }
        })
      },
    }

}
</script>


