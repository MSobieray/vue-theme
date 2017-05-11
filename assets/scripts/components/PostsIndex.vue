<template>
  <div class="post">
    <!-- <div class="post-content" v-for="post in posts">
      <a :href="post.link">
        <h2 v-text="post.title.rendered"></h2>
      </a>
    </div> -->

    <v-card v-for="post in posts" :key="post.id">
      <v-card-row class="blue-grey darken-1">
        <v-card-title>
          <span class="white--text">{{ post.title.rendered }}</span>
          <v-spacer></v-spacer>
        </v-card-title>
      </v-card-row>
      <v-card-row img="" height="300px"></v-card-row>
      <v-card-text class="blue-grey darken-3 white--text">
        <div v-html="post.excerpt.rendered"></div>
      </v-card-text>
      <v-card-row actions class="blue-grey darken-1 mt-0">
        <v-btn tag="a" :href.native="post.link" flat class="white--text" >Read More
          <v-icon right>navigate_next</v-icon>
        </v-btn>
      </v-card-row>
    </v-card>
  </div>

</template>

<script>
export default {
  name: 'posts-index',
  data () {
    return {
      posts: [],
    }
  },
  created: function () {
    const location = window.location.origin
  	const wp_posts = location + '/wp-json/wp/v2/posts'

	  fetch(wp_posts)
    .then(res => res.json())
    .then(data => {
      this.posts = data
      console.log(this.posts)
      if (location === 'http://localhost:3000') {
        this.posts.forEach(el => { 
          let newURL = el.link.replace('4001', '3000')
          el.link = newURL
        })
      }
    })
    console.log(this.posts)
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.post {
  display: flex;
  align-items: baseline;
  .card {
    flex: 1;
    margin: 1rem;
  }
}

</style>