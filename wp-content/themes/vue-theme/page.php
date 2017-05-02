<?php get_header(); ?>
	<div id="app">
		<v-app id="example-3" left-fixed-sidebar>
		  <v-toolbar>
		    <v-toolbar-side-icon @click.native.stop="nav3 = !nav3" />
		    <v-toolbar-logo>Vue Theme</v-toolbar-logo>
		  </v-toolbar>
		  <main>
		    <v-sidebar left fixed drawer v-model="nav3">
		      <v-list>
		        <v-list-item v-for="page in nav">
		          <v-list-tile>
		            <v-list-tile-title><a v-bind:href="page.url">{{ page.title }}</a></v-list-tile-title>
		          </v-list-tile>
		        </v-list-item>
		      </v-list>
		    </v-sidebar>
		    <v-content>
		      <v-container fluid>
		        <div class="title">
							<h1>{{ message }}</h1>
							<h2>{{ title }}</h2>
		        </div>
		      </v-container>
		    </v-content>
		  </main>
		</v-app>
		
	</div>
	<?php the_content(); ?>

<?php get_footer(); ?>