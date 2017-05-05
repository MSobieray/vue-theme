<?php get_header(); ?>
<section id="posts">
	<!-- <v-card v-for="post in posts" :key="post.id">
	  <v-card-row class="blue-grey darken-1">
	    <v-card-title>
	      <span class="white--text">{{ post.title.rendered }}</span>
	      <v-spacer></v-spacer>
	    </v-card-title>
	  </v-card-row>
	  <v-card-row img="" height="300px"></v-card-row>
	  <v-card-text class="blue-grey darken-3 white--text">
	    <div v-html="html">{{ post.content.excerpt }}</div>
	  </v-card-text>
	  <v-card-row actions class="blue-grey darken-1 mt-0">
	    <v-btn flat class="white--text" :href="post.url">Read Post
	    	<v-icon right>navigate_next</v-icon>
	    </v-btn>
	  </v-card-row>
	</v-card> -->
	<post></post>
</section>

<?php get_footer(); ?>