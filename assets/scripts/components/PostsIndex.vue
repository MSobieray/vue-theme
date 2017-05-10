<template>
  <div class="post">
    <div class="post-content" v-for="post in posts">
      <a :href="post.link">
        <h2 v-text="post.title.rendered"></h2>
      </a>
    </div>
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
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>