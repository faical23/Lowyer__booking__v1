<template>
  <div class="client">
    <div class="user_data">
        <img src="../assets/img/avatar.png">
        <p> First name : <span>{{Fname}}</span> </p>
        <p>Last name :  <span>{{Lname}}</span> </p>
        <p>Email : <span>{{Email}}</span> </p>
        <p>Phone number :  <span>{{PhoneNumber}}</span> </p>
        <p>Token :  <span>{{Token}}</span> </p>
        <button @click="logout">logout</button>
    </div>
    <div class="historique__resereve">
      <h3>Historique</h3>
      <table>
        <tr class="table__header">
          <th  >Date</th>
          <th>Time start</th>
          <th>Time end</th>
          <th>Status</th>
          <th  >Action</th>
        </tr>
        <tr v-for="histo in historique" :key="histo"> 
          <td class="first__td_child">{{histo.day}}</td>
          <td>{{histo.time_start}}</td>
          <td>{{histo.time_end}}</td>
          <td v-if="status">{{histo.status}}</td>
          <td class="last__td_child">
            <button>Delete</button>
          </td>
        </tr>
      </table>
      <button @click="addunew__reserve">Add</button>
    </div>
    </div>
</template>

<script>


export default {


  data(){
    return{
      name: 'Home',
      jwt :localStorage.getItem('jwt'),
      Fname :"",
      Lname:"",
      Email:"",
      PhoneNumber:"",
      Token:"",
      ID:"",
      params : {method:"GET",headers:{'Content-type': 'application/json'}},
      historique:'',
      status:true,   


    }
  },
  components: {
    },
  methods:{
    fetch__methode : async function (search,params,Api){
        let rep = await fetch(`${Api + search}` , params);
        let reponse = await rep.json();
        return reponse;
      },
      get__user__data: function(){
        console.log(this.jwt)
        let Api = "http://localhost/Lowyer__booking__v1/back_end/api/Token__Api.php";
        var params = {method:"POST",headers:{'Content-type': 'application/json'},body:JSON.stringify({'jwt':this.jwt})}
        let user_data = this.fetch__methode("",params,Api);
        user_data.then((res)=>{
          console.log(res)
            this.Fname = res.data[0].Fname
            this.Lname = res.data[0].Lname
            this.Email = res.data[0].Email
            this.PhoneNumber= res.data[0].PhoneNumber
            this.Token = res.data[0].Token
            this.get_historique_book(this.Token)
        })
        },
      get_historique_book: function(Token){
        let Api = "http://localhost/Lowyer__booking__v1/back_end/api/historique__Api.php";
        let search = `?Token=${Token}`
        let historique__book = this.fetch__methode(search,this.params,Api);
        historique__book.then((res)=>{
          this.historique=res.data
          console.log(res)
          // var date_from_DB = res.data[3].day;
          // var split__date = date_from_DB.split('/');
          // var date = new Date (split__date [2], split__date [1] - 1,split__date [0]); //using a[1]-1 since Date object has month from 0-11
          // var Today = new Date();
          // if(date < Today){
          //   // this.status = true
          //   console.log("dazt");
          // }
          // else{
          //   // this.status = false
          //   console.log("mzl madaazt")
          // }

        })
      }
        ,
        logout:function(){
          localStorage.removeItem('jwt');
          this.$router.push('/home')
        }
    },
    mounted() {
      this.get__user__data()
    }
}
</script>
