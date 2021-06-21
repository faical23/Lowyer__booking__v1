<template>
    <div class="calendar">
        <div v-show="date_choose && click_time == false" class="calender_date">
                    <div class="calendar-header">
                <span class="month-picker" id="month-picker"></span>
                <div class="year-picker">
                    <span class="year-change" id="prev-year">
                        <pre><svg class="switch_years" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12l4.58-4.59z"/></svg></pre>
                    </span>
                    <span id="year">2021</span>
                    <span class="year-change" id="next-year">
                        <pre><svg class="switch_years" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg></pre>
                    </span>
                </div>
            </div>
            <div class="calendar-body">
                <div class="calendar-week-day">
                    <div class="weekand">Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div class="weekand">Sat</div>
                </div>
                <div class="calendar-days"></div>
            </div>
            <div class="month-list"></div>
        </div>
        <div v-show="date_choose == false &&  between_time_and__valide == true" class="calendar-time">
                <h4>Choose ur time</h4>
                <div class="calendar-time__N">
                    <ul v-for="time in time_work_data " :key="time">
                        <li class="zone_time">{{time.start_time}}</li>
                        <p>To</p>
                        <li class="zone_time">{{time.end_time}}</li>
                        <li class="btn__zone"><button  :disabled="time.check != 'avaible'" :class="[time.check == 'avaible' ? 'btn__avaible_time' : 'btn__reserve_time']" @click="get_time(time.start_time,time.end_time),click_time = true,date_choose = true">{{time.check}}</button></li>
                    </ul>
                </div>
             <button class="row__back" @click.prevent @click="date_choose = true">
                <svg class="back_arrow"  xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            </button>
        </div>
        <div  v-show="click_time" class="calender_valide">
            <h4>write your subject her</h4>
            <textarea type="text" placeholder="Sujet" v-model="sujet"></textarea>
            <p v-if="invalide_message" class="error__form">error in field please try again</p>
            <button @click="valide__reserve">Valide</button>
            <button class="row__back" @click.prevent @click="click_time = false , date_choose = false">
                <svg class="back_arrow"  xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            </button>
        </div>
        <div v-show="valide_message" class="message_valide">
            <svg width="146" height="146" viewBox="0 0 146 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="73" cy="73" r="70" stroke="#00E425" stroke-width="6"/>
                <path d="M49.0355 68.9645C47.0829 67.0118 43.9171 67.0118 41.9645 68.9645C40.0118 70.9171 40.0118 74.0829 41.9645 76.0355L49.0355 68.9645ZM63 90L66.7249 86.6646L66.633 86.5619L66.5355 86.4645L63 90ZM65 90L61.4645 86.4645L61.367 86.5619L61.2751 86.6646L65 90ZM106.036 56.0355C107.988 54.0829 107.988 50.9171 106.036 48.9645C104.083 47.0118 100.917 47.0118 98.9645 48.9645L106.036 56.0355ZM41.9645 76.0355L59.4645 93.5355L66.5355 86.4645L49.0355 68.9645L41.9645 76.0355ZM63 90C59.2751 93.3354 59.2761 93.3365 59.2771 93.3376C59.2774 93.338 59.2784 93.3391 59.2791 93.3399C59.2805 93.3414 59.2818 93.3429 59.2832 93.3445C59.286 93.3475 59.2888 93.3506 59.2916 93.3538C59.2973 93.3601 59.3032 93.3665 59.3092 93.3732C59.3214 93.3865 59.3343 93.4005 59.3479 93.4151C59.3752 93.4443 59.4056 93.4763 59.4391 93.5107C59.5058 93.5792 59.5866 93.659 59.6807 93.7462C59.8641 93.916 60.1231 94.1373 60.4512 94.364C61.0122 94.7515 62.2687 95.5 64 95.5V85.5C65.179 85.5 65.9355 85.9985 66.1346 86.136C66.2817 86.2377 66.3943 86.334 66.4764 86.4101C66.52 86.4504 66.5615 86.4911 66.6015 86.5322C66.6217 86.5529 66.642 86.5742 66.6624 86.5961C66.6726 86.6071 66.683 86.6183 66.6934 86.6297C66.6986 86.6354 66.7038 86.6411 66.709 86.6469C66.7117 86.6499 66.7143 86.6528 66.717 86.6557C66.7183 86.6572 66.7196 86.6587 66.7209 86.6601C66.7216 86.6609 66.7226 86.662 66.7229 86.6624C66.7239 86.6635 66.7249 86.6646 63 90ZM64 95.5C65.7313 95.5 66.9878 94.7515 67.5488 94.364C67.8769 94.1373 68.1359 93.916 68.3193 93.7462C68.4134 93.659 68.4942 93.5792 68.5609 93.5107C68.5944 93.4763 68.6248 93.4443 68.6521 93.4151C68.6657 93.4005 68.6786 93.3865 68.6908 93.3732C68.6968 93.3665 68.7027 93.3601 68.7084 93.3538C68.7112 93.3506 68.714 93.3475 68.7168 93.3445C68.7182 93.3429 68.7195 93.3414 68.7209 93.3399C68.7216 93.3391 68.7226 93.338 68.7229 93.3376C68.7239 93.3365 68.7249 93.3354 65 90C61.2751 86.6646 61.2761 86.6635 61.2771 86.6624C61.2774 86.662 61.2784 86.6609 61.2791 86.6601C61.2804 86.6587 61.2817 86.6572 61.283 86.6557C61.2857 86.6528 61.2883 86.6499 61.291 86.6469C61.2962 86.6411 61.3014 86.6354 61.3066 86.6297C61.317 86.6183 61.3274 86.6071 61.3376 86.5961C61.358 86.5742 61.3783 86.5529 61.3985 86.5322C61.4385 86.4911 61.48 86.4504 61.5236 86.4101C61.6057 86.334 61.7183 86.2377 61.8654 86.136C62.0645 85.9985 62.821 85.5 64 85.5V95.5ZM68.5355 93.5355L106.036 56.0355L98.9645 48.9645L61.4645 86.4645L68.5355 93.5355Z" fill="#00E425"/>
            </svg>
            <p>message Successfully!</p>
            <button @click='message_sucess'>Okey</button>
        </div>

    </div>

</template>

<script>


export default {
  name: 'Home',
  data(){
    return{
      click_book :false,
      click_time : false,
      book_date_calendar : "",
      between_time_and__valide :true,
      date_choose:true,
      time_start:"",
      time_end:"",
      sujet:"",
      status:"avaible",
      valide_message : false,
      invalide_message : false,
      time_work_data:"",
      time_reserve_in_this_day :''

    }
  },
  props:['Token'],
  methods:{
    fetch__methode : async function (search,params,Api){
        let rep = await fetch(`${Api + search}` , params);
        let reponse = await rep.json();
        return reponse;
    },
    calender:function(){
                let calendar = document.querySelector('.calendar')

                const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

                let isLeapYear = (year) => {
                    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
                }

                let getFebDays = (year) => {
                    return isLeapYear(year) ? 29 : 28
                }

                let generateCalendar = (month, year) => {

                    let calendar_days = calendar.querySelector('.calendar-days')
                    let calendar_header_year = calendar.querySelector('#year')

                    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

                    calendar_days.innerHTML = ''

                    let currDate = new Date()
                    if (!month) month = currDate.getMonth()
                    if (!year) year = currDate.getFullYear()

                    let curr_month = `${month_names[month]}`
                    month_picker.innerHTML = curr_month
                    calendar_header_year.innerHTML = year

                    
                    let first_day = new Date(year, month, 1)

                    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
                        let day = document.createElement('div')
                        if (i >= first_day.getDay()) {
                            day.classList.add('calendar-day-hover')
                            day.innerHTML = i - first_day.getDay() + 1
                            day.innerHTML += `<span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>`
                            if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                                day.classList.add('curr-date')
                            }
                        }
                        calendar_days.appendChild(day)
                    }
                    this.get_day()
                }

                let month_list = calendar.querySelector('.month-list')

                month_names.forEach((e, index) => {
                    let month = document.createElement('div')
                    month.innerHTML = `<div class="month_zone" data-month="${index}">${e}</div>`
                    month.querySelector('div').onclick = () => {
                        month_list.classList.remove('show')
                        curr_month.value = index
                        generateCalendar(index, curr_year.value)
                    }
                    month_list.appendChild(month)
                })

                let month_picker = calendar.querySelector('#month-picker')

                month_picker.onclick = () => {
                    month_list.classList.add('show')
                }

                let currDate = new Date()

                let curr_month = {value: currDate.getMonth()}
                let curr_year = {value: currDate.getFullYear()}

                generateCalendar(curr_month.value, curr_year.value)

                document.querySelector('#prev-year').onclick = () => {
                    --curr_year.value
                    generateCalendar(curr_month.value, curr_year.value)
                }

                document.querySelector('#next-year').onclick = () => {
                    ++curr_year.value
                    generateCalendar(curr_month.value, curr_year.value)
                }

    },        
    get_day :function(){
                    let x = document.querySelectorAll('.calendar-day-hover')
                    x.forEach(Element =>{

                            Element.addEventListener('click', () =>{
                            this.date_choose = false
                            console.log(this.date_choose)
                            let day = Element.innerHTML;
                            var t = day.split(' ')
                            let r = t[0];
                            var  b = r.replace('<span></span>','')
                            var day__book = b.replace('\n' , '')
                            let month = document.querySelector('.month-picker')
                            let year = document.querySelector('#year')
                            let month_index = {'January' : "01" , 'February' : "02" , 'March' : "03" , 'April' : "04", 'May' : "05",
                            'June' : "06", 'July' : "07", 'August' : "08", 'September' : "09" , 'October' : "10" , 'November' : "11" , 'December' : "12"}
                            let month_book = month_index[month.innerHTML]
                            let year__book = year.innerHTML
                            let date_book =  month_book + '/' + day__book  +  '/' + year__book
                            this.book_date_calendar =  date_book
                                ///// get time work in this day
                            let self_this = this

                            function manage__time() {
                                function time_working(){
                                    let Api = "http://localhost/Lowyer__booking__v1/back_end/api/timeWork__Api.php";
                                    const params = {method:"GET",headers:{'Content-type': 'application/json'},}
                                    let get_time__work = self_this.fetch__methode("",params ,Api)
                                    get_time__work.then((res) =>{
                                    // self_this.time_work_data = res.data
                                    let lawyer__time__work = res.data
                                                function check_time_reserve(){
                                                    let Api = "http://localhost/Lowyer__booking__v1/back_end/api/historique__Api.php";
                                                    let search =`?day=${date_book}`
                                                    const params = {method:"GET",headers:{'Content-type': 'application/json'},}
                                                    let get_time__work = self_this.fetch__methode(search,params ,Api)
                                                    get_time__work.then((res) =>{
                                                    console.log(res)
                                                    let time_reserve_in_this_day = res.data

                                                    //// make comparaisone between time work and time was reserve in this day


                                                    //   i make this for add all time start work inside this arrays
                                                    let time_start_work = []
                                                    // i make this to add all time start reserved inside this arrays
                                                    let time_strat_reserved = [] 
                                                    // this arrays is for add new time_work after remove time reserved in this days
                                                    let new__time_work_after_make_comparaisone = [];
                                                    time_reserve_in_this_day.forEach(Element =>{
                                                        time_strat_reserved.push(Element.time_start)
                                                    })

                                                    //////////////
                                                    lawyer__time__work.forEach(Element =>{
                                                        time_start_work.push(Element.start_time)
                                                        let reserve = '';
                                                        if(time_strat_reserved.includes(Element.start_time))
                                                        {
                                                            reserve = {"check" : "reserve"}
                                                            new__time_work_after_make_comparaisone.push({...reserve, ...Element});
                                                            // lawyer__time__work.push(reserve)

                                                        }
                                                        else{
                                                            reserve = {"check" : "avaible"}
                                                            new__time_work_after_make_comparaisone.push({...reserve, ...Element});
                                                            // lawyer__time__work.push(reserve)
                                                        }
                                                    })

                                                    // console.log(lawyer__time__work)
                                                    self_this.time_work_data = new__time_work_after_make_comparaisone
                                                    console.log(self_this.time_work_data)
                                                    

                                                })
                                            }
                                             check_time_reserve();
                                     })
                                }

                                time_working();
 
                            }
                            manage__time();

                        })
                    })
    },
    get_time:function(time_start,time_end){
        this.time_start = time_start
        this.time_end = time_end
    },
    valide__reserve:function(){
        let Api = "http://localhost/Lowyer__booking__v1/back_end/api/book__Api.php";
        const data = JSON.stringify({
            "Topic" :this.sujet,
            "day" :this.book_date_calendar,
            "time_start":this.time_start,
            "time_end" :this.time_end,
            "status" :this.status,
            "Token" :this.Token
        })
        const params = {method:"POST",headers:{'Content-type': 'application/json'},body:data}
        let valide_insert = this.fetch__methode("",params,Api)
        valide_insert.then((res) =>{
            
            if(res.error == "valide" ){
                this.valide_message = true
                this.invalide_message = false
                this.date_choose = false;
                this.click_time = false
                this.between_time_and__valide = false
            }
            else{
                this.invalide_message = true
            }
        })
    },
    message_sucess:function(){
        this.valide_message = false;
        this.$router.push('/home')
    }

  },
  mounted(){
      this.calender();
  }
}

</script>

