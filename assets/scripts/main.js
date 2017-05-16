import Vue from 'vue'
import Vuetify from 'vuetify'
import '../styles/stylus/main.styl'

import PostsIndex from './components/PostsIndex.vue'
import SinglePost from './components/SinglePost.vue'
import SiteLoader from './components/SiteLoader.vue'
// import 'vuetify/dist/vuetify.min.css';
// import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)
//import App from './components/App'

/* eslint-disable no-new */
new Vue({
  el: '#app',
  data: {
    themeName: 'Vue Theme',
    nav: [],
    title: '',
    content: '',
    menu: '',
    page: 1,
  },
  components: {
   PostsIndex,
   SinglePost,
   SiteLoader,
  }, 
  created() {
    const app = this
    const location = window.location.origin
    const wp_nav = location + '/wp-json/wp-api-menus/v2/menu-locations/main-navigation'
    const wp_pages = location + '/wp-json/wp/v2/pages'

    fetch(wp_nav)
    .then(res => res.json())
    .then(data => {
      app.nav = data 
      if (location === 'http://localhost:3000') { // used to swap out url to keep you routing to the dev site
        app.nav.forEach(el => { 
          let newURL = el.url.replace('4001', '3000')
          el.url = newURL
        })
      }
    })
    fetch(wp_pages)
    .then(res => res.json())
    .then(data => {
      data.forEach(el => { 
        if (el.link === 'http://localhost:4001' + window.location.pathname) {
          app.title = el.title.rendered
          app.content = el.content.rendered
        }
      })
      // console.log(data)
    })


  }, 
})