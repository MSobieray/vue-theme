<?php get_header(); ?>
	<v-content>
	  <v-container fluid>
	    <div class="title">
				<h2>{{ title }}</h2>
	    </div>
	  </v-container>
	</v-content>	 
	<?php the_content(); ?>

<?php get_footer(); ?>