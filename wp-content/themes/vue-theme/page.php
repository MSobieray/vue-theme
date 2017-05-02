<?php get_header(); ?>

	<h2><?php the_title(); ?></h2>
	<div id="app">
		<nav>
			<ul>
				<li v-for="page in nav"><a v-bind:href="page.url">{{ page.title }}</a></li>
			</ul>
		</nav>
		<h1>{{ message }}</h1>
		<h2>{{ title }}</h2>
	</div>
	<?php the_content(); ?>

<?php get_footer(); ?>