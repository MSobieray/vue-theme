<template>
  <div class="single-post">
    <div class="single-post-content">
        <img :src="imageData.source_url">
        <h1 v-text="post[0].title.rendered"></h1>
        <div v-html="post[0].content.rendered"></div>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: 'single-post',
  data () {
    return {
      post: [],
      postId: '',
      slug: '',
      imageUrl: '',
      imageData: [],
    }
  },
  mounted() {
    const location = window.location.origin
    let pathname = window.location.pathname;

    pathname = pathname.replace(/[\/\/]/,'');
  	const wp_post = location + '/wp-json/wp/v2/posts?slug='+pathname
	  
    fetch(wp_post)
    .then(res => res.json())
    .then(data => {
      this.post = data
      this.imageUrl = this.post[0]._links['wp:featuredmedia'][0].href
      console.log(this.post)
      console.log(this.imageUrl)
    })
    setTimeout(() => {
      fetch(this.imageUrl)
      .then(res => res.json())
      .then(data => {
        this.imageData = data
        console.log(this.imageData)
      })
    }, 100)
    
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>