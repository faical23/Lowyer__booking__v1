<template>
  <div class="home">
    <h1>this is user profile</h1>
    <div class="user_data">
        <p>First name : {{Fname}}</p>
        <p>Last name : {{Lname}}</p>
        <p>Email : {{Email}}</p>
        <p>Phone number : {{PhoneNumber}}</p>
        <p>Token : {{Token}}</p>
    </div>
    <div class="add__book">
      <button>Add book</button>
       <div id="calendar"></div>

    </div>
    <button @click="logout">logout</button>
  </div>
</template>

<script>
// import VCalendar from 'v-calendar'
// import Vue from '../../node_modules/vue';

// import Calendar from 'v-calendar/lib/components/calendar.umd'
// import DatePicker from 'v-calendar/lib/components/date-picker.umd'

// Vue.use(VCalendar, {
//     componentPrefix: 'vc',  // Use <vc-calendar /> instead of <v-calendar />
//               // ...other defaults
// });
// // Register components in your 'main.js'
// Vue.component('calendar', Calendar)
// Vue.component('date-picker', DatePicker)


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
