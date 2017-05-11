# Vue Theme

## A Wordpress Theme Using Vue.js

### Intro
A Wordpress theme that is built with vue.js and a modern development work flows. __This Theme is NOT a SPA__  It is meant to hold onto the basic wordpress structure.

The theme is versitile enough to use Vue components that get data from the WP rest API, but you can still write php and use all the familiar WP functions you know and love.

### Dependencies

- Docker - (optional but comes with a docker-compose to quickly spin up Wordpress and a DB locally)
- Webpack to compile and watch assets for changes
- Buble ES2015 compiler
- BrowserSync to reverse proxy the site while in development _curently not working right_
- Vue.js to handle components and front-end development
- Vuetify to quickly allow access to a material design framework and rapid prototyping.
- WP REST API Menus - A WP Plugin that gives you an endpoint in the REST API with the menu data.
- Scss/Stylus - I use Scss as the main css lang and Stylus is used for Vuetify but you can use it as the primary lang if you like.

_All the dependinces will be installed with the setup except you will need to have [docker](https://www.docker.com) installed on your machine and wil also need to install WP Rest API Menus plugin via the wordpress admin_

### Getting Setup

- Clone this repo
- run `docker-compose up -d`
- Setup you wordpress install on [localhost:4001](http://localhost:4001) and change the apperance to use Vue Theme
- run `npm install`
- run `npm start` - this will reverse proxy localhost:4001 to localhost:3000 start BrowserSync and watch the app for changes with hot reloading.

At this point you should have a the app running and ready for development

when you want to compile the assets for production close down webpack server and then run `npm run build`

### File Structure

Assets:  
-	build (webpack files)
- fonts (add you site fonts here)
- images (add you site images here)
- scripts:
	-  components (Vue Components)
	-  main.js (Webpack entrypoint and Vue Setup)
- styles (all the scss and stylus files)

### Nice To Haves

- [ ] Vuex
- [ ] IndexDB
- [ ] Service Workes
