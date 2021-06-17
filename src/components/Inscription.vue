<template>
    <div class="Inscription">
        <h1>Inscription</h1>
        <form action="">
            <input type="text" placeholder="First Name" v-model="Fname">
            <input type="text" placeholder="Last Name"  v-model="Lname">
            <input type="text" placeholder="Email" v-model="Email">
             <input type="text" placeholder="Phone Number" v-model="PhoneNumber">
            <button  @click.prevent @click="submit__data">Sign up</button>
            <p v-if="error_field">Error in some field</p>
            <p v-if="exist_Email">Email exist</p>
        </form>
        <form action="" v-if="get__token">
          <p> ur token is : {{Token}}</p>
          <input type="text" placeholder="token" v-model="input_token">
          <button  @click.prevent @click="valide__token" >Valide</button>
        </form>
    </div>
</template>



<script>
export default {
    name:'Inscription',
    data (){
        return{
            api :"http://localhost/Lowyer__Booking/back_end/api/Api.php",
            Fname:"",
            Lname:"",
            Email:"",
            PhoneNumber:"",
            error_field:false,
            exist_Email:false,
            get__token:false,
            Token:"",
            input_token:""
        }
    },
    methods:{

      fetch__methode : async function (params,search){
          let rep = await fetch(`http://localhost/Lowyer_v2/back_end/api/Api.php${search}` , params);
          let reponse = await rep.json();
          return reponse;
      },
      submit__data:function(){
          let params = {method:"GET",headers:{'Content-type': 'application/json'}}
          let search =`?Email=${this.Email}`
          let get_email = this.fetch__methode(params,search)
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
        console.log(this.input_token)
      }
    }
}
</script>


