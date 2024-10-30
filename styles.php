<?php
/*
Plugin Name: Child Styles
Plugin URI: http://philippe.bp-fr.net/2012/08/07/child-styles-pour-des-css-efficaces-et-plus-lisibles/
Description: Makes your styles easier to parse and accelerates your pages while loading.
Author: Philippe Gras
Version: 1.0
Author URI: http://www.paul-emploi.biz/
*/

// Copies template's files in the plugin directory :

function cs_copy() {
	$files = array( 'single',
			'page',
			'404',
			'archive',
			'index',
			'style',
			'activity',
			'activities',
			'members',
			'forum',
			'forums',
			'register',
			'activation',
			'profile',
			'blogs',
			'groups'
			);

	$source = get_stylesheet_directory_uri() . '/style.css';
	if ( function_exists( 'bp_is_active' ) ) {
		foreach ( $files as $file ) {
			if ( !file_exists( $file ) ) {
				$copy = copy( $source, plugin_dir_path(__FILE__) . $file . '.css' );
			}
		}
	} else {
		for ( $i = 0; $i < 6; $i++ ) {
			if ( !file_exists( $file ) ) {
				$copy = copy( $source, plugin_dir_path(__FILE__) . $files[$i] . '.css' );
			}
		}
	}

	return apply_filters( 'cs_copy', $copy );
}
register_activation_hook( __FILE__, 'cs_copy' );

// Hack the 'bloginfo_url' hook :

function child_styles( $file ) {
	if ( function_exists( 'bp_is_active' ) && bp_is_active( $file ) ) {
	$stylesheet_uri = plugins_url( bp_display( $file ), __FILE__ );
	} else {
	$stylesheet_uri = plugins_url( cs_display( $file ), __FILE__ );
	}
	return apply_filters('child_styles', $stylesheet_uri );
}
add_filter ( 'stylesheet_uri', 'child_styles' );

// (WP) Display the correct stylesheet according the current taxonomy :

function cs_display() {
	if ( is_single() ) {
		$file = 'single.css';
	} elseif ( is_page() ) {
		$file = 'page.css';
	} elseif ( is_404() ) {
		$file = '404.css';
	} elseif ( is_archive() || is_search() ) {
		$file = 'archive.css';
	} elseif ( is_home() ) {
		$file = 'index.css';
	} else $file = 'style.css';
	return apply_filters( 'cs_display', $file );
}

// (BP) Display the correct stylesheet according the current component :

function bp_display() {
	global $bp;
	if ( !bp_is_blog_page() ) {
		if ( is_numeric( $bp->current_action ) ) {
			$file = 'activity.css';
		} elseif ( 'activity' == $bp->current_action || 'home' == $bp->current_action ) {
			$file = 'activities.css';
		} elseif ( 'friends' == $bp->current_action || 'members' == $bp->current_action ) {
			$file = 'members.css';
		} elseif ( 'forum' == $bp->current_action ) {
			if ( 'topic' == $bp->action_variables[0] ) {
				$file = 'forum.css';
			} else {
				$file = 'forums.css';
			}
		} else {
			if ( bp_is_register_page() ) {
				$file = 'register.css';
			} elseif ( bp_is_activation_page() ) {
				$file = 'activation.css';
			} elseif ( 'profile' == $bp->current_component ) {
				$file = 'profile.css';
			} elseif ( 'friends' == $bp->current_component ) {
				$file = 'activities.css';
			} elseif ( 'forums' == $bp->current_component ) {
				$file = 'forums.css';
			} elseif ( 'blogs' == $bp->current_component ) {
				$file = 'blogs.css';
			} elseif ( 'activity' == $bp->current_component ) {
				$file = 'activities.css';
			} elseif ( 'members' == $bp->current_component ) {
				$file = 'members.css';
			} elseif ( 'groups' == $bp->current_component ) {
				if ( 'topic' == $bp->action_variables[0] ) {
					$file = 'forum.css';
				} else 	$file = 'groups.css';
			} else {
				$file = 'style.css';
			}
		}
	} else 	$file = cs_display( $file );

	return apply_filters( 'bp_display', $file );
}

?>