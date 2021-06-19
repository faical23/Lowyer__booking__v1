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
        <tr>
          <td class="first__td_child">18/09/2022</td>
          <td>10:00 </td>
          <td>10:30</td>
          <td >dazt</td>
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
      selectedDate: null,


    }
  },
  components: {
    },
  methods:{
    fetch__methode : async function (search,params){
        let rep = await fetch(`http://localhost/Lowyer__booking__v1/back_end/api/Api.php${search}` , params);
        let reponse = await rep.json();
        return reponse;
      },
      get__user__data: function(){
        console.log(this.jwt)
        var params = {method:"POST",headers:{'Content-type': 'application/json'},body:JSON.stringify({'jwt':this.jwt})}
        let user_data = this.fetch__methode("",params);
        user_data.then((res)=>{
          console.log(res)
            this.Fname = res.data[0].Fname
            this.Lname = res.data[0].Lname
            this.Email = res.data[0].Email
            this.PhoneNumber= res.data[0].PhoneNumber
            this.Token = res.data[0].Token
        })
        },
      get_historique_book: function(){
        
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
