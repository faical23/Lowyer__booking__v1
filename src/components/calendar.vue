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
        <div v-show="date_choose == false" class="calendar-time">
                <h4>Choose ur time</h4>
                <div class="calendar-time__N">
                    <ul>
                        <li class="zone_time">10:00 PM</li>
                        <p>To</p>
                        <li class="zone_time">10:30 PM</li>
                        <li class="btn__zone"><button class="btn__book__time" @click="get_time('10:00 PM','10:30 PM'),click_time = true,date_choose = true">Book</button></li>
                    </ul>
                </div>
                <div class="calendar-time__N">
                    <ul>
                        <li class="zone_time">10:00 PM</li>
                        <p>To</p>
                        <li class="zone_time">10:30 PM</li>
                        <li class="btn__zone"><button class="btn__book__time">Book</button></li>
                    </ul>
                </div>
                <div class="calendar-time__N">
                    <ul>
                        <li class="zone_time">10:00 PM</li>
                        <p>To</p>
                        <li class="zone_time">10:30 PM</li>
                        <li class="btn__zone"><button class="btn__expired__time">Reserved</button></li>
                    </ul>
                </div>
                <div class="calendar-time__N">
                    <ul>
                        <li class="zone_time">10:00 PM</li>
                        <p>To</p>
                        <li class="zone_time">10:30 PM</li>
                        <li class="btn__zone"><button class="btn__book__time">Book</button></li>
                    </ul>
                </div>
                <div class="calendar-time__N">
                    <ul>
                        <li class="zone_time">10:00 PM</li>
                        <p>To</p>
                        <li class="zone_time">10:30 PM</li>
                        <li class="btn__zone"><button class="btn__expired__time">Reserved</button></li>
                    </ul>
                </div>

             <button class="row__back" @click.prevent @click="date_choose = true">
                <svg class="back_arrow"  xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
            </button>
        </div>
        <div  v-show="click_time" class="calender_valide">
            <h4>ur topic</h4>
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
      date_choose:true,
      time_start:"",
      time_end:""
    }
  },
  methods:{
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
                            let month_index = {'January' : 1 , 'February' : 2 , 'March' :3 , 'April' : 4, 'May' :5,
                            'June' : 6, 'July' : 7, 'August' : 8, 'September' : 9 , 'October' : 10, 'November' : 11, 'December' : 12}
                            let month_book = month_index[month.innerHTML]
                            let year__book = year.innerHTML
                            let date_book = day__book + '\\'  + month_book  +  '\\' + year__book
                            this.book_date_calendar =  date_book

                            this.choode__time();
                        })
                    })
    },
    get_time:function(time_start,time_end){
        this.time_start = time_start
        this.time_end = time_end
    },
    choode__time:function () {
        console.log(this.book_date_calendar);
    }
  },
  mounted(){
      this.calender();
  }
}

</script>

