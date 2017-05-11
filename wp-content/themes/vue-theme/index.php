<?php get_header(); ?>
<section id="posts">
	<posts-index></posts-index>
	<v-pagination v-bind:length.number="5" v-model="page" />
</section>
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		// Post Content here
		//
		// the_title();
		// the_excerpt();
	} // end while
} // end if
?>
<?php get_footer(); ?>