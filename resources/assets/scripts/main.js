/** import external dependencies */
// import 'jquery';

/** import local dependencies */
// import Router from './util/Router';
// import common from './routes/common';
// import home from './routes/home';
// import aboutUs from './routes/about';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
// const routes = new Router({
  /** All pages */
  // common,
  /** Home page */
  // home,
  /** About Us page, note the change from about-us to aboutUs. */
  // aboutUs,
// });

/** Load Events */
// jQuery(document).ready(() => routes.loadEvents());
import Vue from 'vue'
import Vuetify from 'vuetify'
require('../styles/stylus/main.styl')
// import 'vuetify/dist/vuetify.min.css';
// import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)
// import App from './components/App'

/* eslint-disable no-new */
new Vue({
  el: '#app',
  data: {
    message: 'Vue Theme!',
    nav: [],
    title: '',
    menu: '',
    posts: [],
    card_text: 'Test',
  },
  created: function () {
    const app = this
    let location = window.location.origin
    const wp_nav = location + '/wp-json/wp-api-menus/v2/menu-locations/main-navigation'
    const wp_pages = location + '/wp-json/wp/v2/pages'
    const wp_posts = location + '/wp-json/wp/v2/posts'


    fetch(wp_nav)
      .then(res => res.json())
      .then(data => {
        app.nav = data 
        if (location === 'http://localhost:3000') {
          app.nav.forEach(el => { 
            let newURL = el.url.replace('4001', '3000')
            el.url = newURL
            console.log(el.url)
          })
        }
      })

    fetch(wp_pages)
      .then(res => res.json())
      .then(data => {
        data.forEach(el => { 
          if (el.link === 'http://localhost:4001' + window.location.pathname) {
            app.title = el.title.rendered
          }
        })
      })

    fetch(wp_posts)
      .then(res => res.json())
      .then(data => {
        app.posts = data 
        if (location === 'http://localhost:3000') {
          app.posts.forEach(el => { 
            let newURL = el.link.replace('4001', '3000')
            el.link = newURL
          })
        }
      })
  },
  
    
})