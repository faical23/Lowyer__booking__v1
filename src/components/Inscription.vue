<template>
    <div class="Inscription">
        <h1>Inscription</h1>
        <form action="" v-if="have__token || get__token">
            <p v-if="get__token"> ur token is : {{Token}}</p>
            <input type="text" placeholder="token" v-model="input_token">
            <p v-if="token_invalide">Token invalide please try again</p>
            <button  @click.prevent @click="valide__token" >Valide</button>
            <button @click="have__token = false" v-if="get__token != true">i don't have token</button>
        </form>
        <form action="" v-else>
            <input type="text" placeholder="First Name" v-model="Fname">
            <input type="text" placeholder="Last Name"  v-model="Lname">
            <input type="text" placeholder="Email" v-model="Email">
             <input type="text" placeholder="Phone Number" v-model="PhoneNumber">
            <button  @click.prevent @click="submit__data">Sign up</button>
            <button @click="have__token = true">i have token</button>
            <p v-if="error_field">Error in some field</p>
            <p v-if="exist_Email">Email exist</p>
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
            token_invalide : false

        }
    },
    methods:{

      fetch__methode : async function (params,search){
          let rep = await fetch(`http://localhost/Lowyer_v2/back_end/api/Api.php${search}` , params);
          let reponse = await rep.json();
          return reponse;
      },
      submit__data:function(){
          let search =`?Email=${this.Email}`
          let get_email = this.fetch__methode(this.params,search)
          get_email.then((result) =>{
            let exist = result.data.length;
            if(exist == 0){
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
          if(result.data.length == 1)
          {
            this.token_invalide = false
            console.log(result)
          }
          else{
            this.token_invalide = true
          }
        })
      }
    }
}
</script>


