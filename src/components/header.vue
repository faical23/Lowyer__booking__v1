<template>
  <header :class="{'header_scroll': scrolled }">
    <div class="MyContainer">
      <div class="Header__NavBar">
          <div class="Header__NavBar__RightMenu">
            <ul>
                <router-link to="/home" tag="li"  :class="['logo',[scrolled ? 'logo_scroll ' : 'logo_default']]">MYBARBER</router-link>

                <!-- <li  class="logo__item"><a href="#" :class="['logo',[scrolled ? 'logo_scroll ' : 'logo_default']]">MYBARBER</a></li> -->
                  <router-link :to="link.path" tag="li" class="menu__item" v-for="link in haeder_menu.right_menu" :key="link.path">
                      <a  :class="[scrolled ? 'item_navbar_menu_scroll ' : 'item_navbar_menu']" >{{link.title}}</a>
                  </router-link>
            </ul>
          </div>
          <div class="Header__NavBar__LeftMenu">
            <ul>
                <li class="header__connexion ">
                      <a :class="[scrolled ? 'item_navbar_menu_scroll ' : 'item_navbar_menu']">{{haeder_menu.left__menus[0].title}}</a>
                  </li>
                <li class="header__button">
                    <button :class="[scrolled ? 'secondry_GetStarted' : 'primary_GetStarted']"  @click="Page__scroll">
                        {{haeder_menu.left__menus[1].title}}
                    </button>
                </li>
                <li class="moustache_zone_before_showed">
                    <div class="burger_menu" @click="Burger__menu">
                        <svg ref="mostache" :class="['mostache',[mostache ? 'mostache_retation' : 'mostache__native'],[scrolled ? 'mostache_scroll' : 'mostache__default']]" enable-background="new 0 0 1042 1042 " height="64 " viewBox="0 0 1042 1042 " width="64 " xmln="http://www.w3.org/2000/svg "><g><path d="m730.7 377.9c-69.8 0-131.9-17.3-179.5-50-11-7.5-21.1-15.9-30.2-24.9-9.1
                            9-19.2 17.3-30.2 24.9-47.6 32.7-109.7 50-179.5 50-59.7 0-121.1-13.3-172.9-37.5-5.8-2.7-11.4-5.6-17-8.5v378.8c0 43.9 25.1 82.1 61.7 101v-171.8h61.3v186.8c0 62.3 47.5 113.7 108.2 119.9v-183.8h61.3v184.3c43.7 65.3 99.3 89.2 107.1 94.8
                            7.7-5.5 63.3-29.4 107-94.8v-184.3h61.3v183.7c60.7-6.2 108.2-57.6 108.2-119.9 0-19 0-167.5 0-186.8h61.3v171.7c36.6-18.9 61.7-57.1 61.7-101v-378.7c-57.3 30.6-125.4 46.1-189.8 46.1z "/><path d="m521 154.4c1.1-85.1-69.2-160-154.1-154.1-146.6
                            10.3-121.5 168.7-304.9 193.5 85.2 163.7 456.1 176.3 459-39.4z "/><path d="m675.1.3c-84.9-5.9-155.2 69-154.1 154.1 2.9 215.7 373.8 203.1 458.9 39.4-183.3-24.9-158.2-183.2-304.8-193.5z "/></g>
                        </svg>
                    </div>
                  </li>
            </ul>
          </div>
        </div>
    </div>
  </header>
</template>

<script>
  export default {
    name: 'header',
    data() {
      return {
                haeder_menu:{
                  right_menu:[
                      {
                          title:"Home",
                          path:"/home"
                      },
                      {
                          title:"Features",
                          path:"/features"
                      },
                      {
                          title:"Pricing",
                          path:"/pricing"
                      },
                      {
                          title:"Contact",
                          path:"/contact"
                      }
                      
                  ],
                  left__menus:[
                      {
                        title:"connexion"
                      },
                      {
                        title:"Get started"
                      },
                  ]
            },
          scrolled: false,
          mostache:false,
        }
    },
    methods:{
      Page__scroll: function(){
          window.scrollY > 0 ? this.scrolled = true : this.scrolled = false
      },
      Burger__menu: function(){
          this.mostache = !this.mostache
      }
    },
    mounted() {
        document.addEventListener('scroll', this.Page__scroll)
    }
  }
</script>




