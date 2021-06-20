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
    <div v-if="historique > 0">
      <table>
        <tr class="table__header">
          <th>ID</th>
          <th  >Date</th>
          <th>Time start</th>
          <th>Time end</th>
          <th>Status</th>
          <th  >Action</th>
        </tr>
        <tr v-for="histo in historique" :key="histo"> 
          <td>{{histo.ID}}</td>
          <td class="first__td_child">{{histo.day}}</td>
          <td>{{histo.time_start}}</td>
          <td>{{histo.time_end}}</td>
          <td >{{histo.status}}</td>
          <td >
            <button :disabled="histo.status != 'avaible'"  :class="[histo.status != 'avaible' ? 'expired_btn' : '']" @click="delete_book(histo.ID)">Delete</button>
          </td>
        </tr>
      </table>
    </div>
    <div v-else>
        <p class="no__historique">No historique her</p>
    </div>

      <button @click="new__book = true">Add</button>
      <div v-if="new__book" class="booking_calendar">
          <calendar></calendar>
      </div>
    </div>
    </div>
</template>

<script>

import calendar from '../components/calendar.vue'


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
      new__book : false


    }
  },
  components: {
    calendar
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
          console.log(this.historique.length)
        })
      },
        logout:function(){
          localStorage.removeItem('jwt');
          this.$router.push('/home')
      },
      delete_book: function(ID){
          let Api = "http://localhost/Lowyer__booking__v1/back_end/api/historique__Api.php";
          console.log(ID)
          let data=JSON.stringify({'ID' : ID})
          let params = {method:"DELETE",headers:{'Content-type': 'application/json'},body:data}
          let res_delete = this.fetch__methode("",params,Api)
          res_delete.then((res) =>{
            console.log(res);
            this.get_historique_book(this.Token);

          })
        }
    },
    mounted() {
      this.get__user__data()
    }
}
</script>
