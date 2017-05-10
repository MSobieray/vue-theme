<?php get_header(); ?>
	
  <div class="page-title">
		<h2 v-html="title"></h2>
		<div class="page-content" v-html="content"></div>
  </div>
	<?php the_content(); ?>

<?php get_footer(); ?>