<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
		<meta name="format-detection" content="telephone=no">

		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php bloginfo('template_url'); ?>/img/favicon/manifest.json">
		<link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon/favicon.ico?v=4">
		<meta name="theme-color" content="#ffffff">
		<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
		<!-- <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css"> -->

		<link href="<?php bloginfo('template_url'); ?>/dist/styles/main.css" rel="stylesheet">
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( 'page-' . $post->post_name ); ?>>
		<div id="app" style="display: none"> <!-- Vue Attaches to this ID -->
			<v-app id="mainNav" left-fixed-sidebar>
			  <v-toolbar>
			    <v-toolbar-side-icon @click.native.stop="menu = !menu" />
			    <v-toolbar-logo>Vue Theme</v-toolbar-logo>
			  </v-toolbar>
			  <main>
			    <v-sidebar left fixed drawer v-model="menu">
			      <v-list>
			        <v-list-item v-for="page in nav" :key="page.id">
			          <v-list-tile>
			            <v-list-tile-title><a v-bind:href="page.url">{{ page.title }}</a></v-list-tile-title>
			          </v-list-tile>
			        </v-list-item>
			      </v-list>
			    </v-sidebar>