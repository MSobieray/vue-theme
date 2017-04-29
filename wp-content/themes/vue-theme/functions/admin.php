<?php

/*==============================================================================
ACF Options Page
==============================================================================*/

/*if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}*/

/*==============================================================================
Custom Login Style
==============================================================================*/

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() { ?>
	<link rel="stylesheet"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/css/wp-login.css'; ?>" />
<?php }


add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {
	return get_bloginfo( 'url' );
}

/*==============================================================================
Custom Admin Style
==============================================================================*/

add_action('admin_enqueue_scripts', 'my_admin_stylesheet');
function my_admin_stylesheet() { ?>
	<link rel="stylesheet"  href="<?php echo get_bloginfo('template_url').'/css/wp-admin.css'; ?>" />
<?php }

/*==============================================================================
Custom Admin Footer
==============================================================================*/

add_filter('admin_footer_text', 'modify_footer_admin');
function modify_footer_admin () {
	echo 'Theme by <a href="http://thefirmgraphics.com" target="_blank">The Firm Graphics<img id="tfg-icon" src="'.get_bloginfo('template_url').'/img/admin/tfg-icon.png" /></a> ';
}

/*==============================================================================
Custom Admin Favicon
==============================================================================*/

function admin_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('template_url').'/img/favicon.ico?v=1" />';
}

add_action('admin_head', 'admin_favicon');
add_action('login_head', 'admin_favicon');

/*================================================================================*/
/* Limited Hide Menus and Update */
/*================================================================================*/

$admin_usernames = array(
	'thefirm',
	'admin'
);

$current_user = wp_get_current_user();

if( !in_array( $current_user->user_login, $admin_usernames ) ) {
	add_action('admin_enqueue_scripts', 'nav_hide_stylesheet');
	function nav_hide_stylesheet() { ?>
		<style>
			#menu-dashboard ul,
			/*#menu-appearance,*/
			#menu-plugins,
			/*#menu-users,*/
			#menu-tools,
			/*#menu-settings,*/
			#toplevel_page_edit-post_type-acf-field-group,
			#toplevel_page_edit-post_type-acf,
			#toplevel_page_cpt_main_menu,
			#toplevel_page_cptui_main_menu,
			#toplevel_page_wponlinebackup,
			#toplevel_page_Wordfence,
			#toplevel_page_w3tc_dashboard,
			#toplevel_page_bws_plugins,
			#toplevel_page_bwp_gxs_generator,
			#wp-admin-bar-updates,
			#menu-posts-soundcloud_track,
			#menu-posts-youtube_video,
			#menu-posts-instagram_photo {
				display: none;
			}
		</style>
	<?php }

	add_action('admin_menu','wphidenag');
	function wphidenag() {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}

/*================================================================================*/
/* All Hide Menus */
/*================================================================================*/

add_action('admin_enqueue_scripts', 'nav_all_hide_stylesheet');
function nav_all_hide_stylesheet() { ?>
	<style>
		#menu-comments,
		#wordfence_activity_report_widget,
		#wp-admin-bar-updraft_admin_node {
			display: none;
		}
	</style>
<?php }

/*==============================================================================
Remove Admin Bar Items
==============================================================================*/

function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-content');
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/*==============================================================================
Removing YOAST Meta Box
==============================================================================*/

 if (!is_admin()) {

	function remove_yoast_metabox(){
	    remove_meta_box('wpseo_meta', 'page', 'normal');
	}
	add_action( 'add_meta_boxes', 'remove_yoast_metabox', 11 );

	function remove_yoast_metabox_clients(){
	    remove_meta_box('wpseo_meta', 'clients', 'normal');
	}
	add_action( 'add_meta_boxes', 'remove_yoast_metabox_clients', 11 );
}