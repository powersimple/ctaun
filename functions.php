<?php

	//enqueues scripts and styles
	require_once("functions/functions-enqueue.php");
	//handles custom metaboxes for admin

	//enqueues scripts and styles

		require_once("functions/rest-endpoints.php");
	// special class to register the restapi

	require_once("functions/rest-menus.php");
	// custom functions to register fields into the restapi
	require_once("functions/rest-register.php");

require_once("functions/sidebars.php");
	require_once("functions/import.php");
	require_once("functions/widgets.php");

	require_once("functions/metaboxes.php");
require_once("functions/metadata.php");
	require_once("functions/navigation.php");
	require_once("functions/media.php");

	require_once("functions/books.php");
require_once("functions/resources.php");
require_once("functions/profiles.php");
	require_once("functions/speakers.php");

	  require_once("functions/sponsors.php");

	global $home_id;

	
add_image_size( 'medium_large', '768', '0', false ); 
add_image_size( 'mobile', '767', '1', false ); 

add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support('post-thumbnails', array(
'post',
'page',
'book',
'appearance',
'review',
'resource',
'sdg',
'profile',
'conference',
'speaker',
'award'
));




		/* OLD RELIABLE!
        HASN'T CHANGED IN YEARS
            RETURNS URL BY ID, AND OPTIONAL SIZE */
			
	  function get_slides( $id ) {
		return get_post_meta($id,"top_slider") ;//from functions.php,
		}

		function getPastSessions($conference){
			global $wpdb;
			$sql = "
			select ID, post_name, post_date, post_title, post_content
			from wp_posts
			where post_type = 'conference'
			and post_parent = $conference
			and post_status='publish'
			
			order by menu_order
				";
			$q = $wpdb->get_results($sql);
			$sessions = array();
			foreach($q as $key => $value){
				extract((array) $value);
				array_push($sessions,
				array(
					"id" => $ID,
					"title" =>$post_title,
					"content" => $post_content,
					"slug" => $post_name,
					"start"=>get_post_meta($ID,"session_start",true),
					"end"=>get_post_meta($ID,"session_end",true),
					"video_embed_url" => get_post_meta($ID,"video_embed_url",true),
					"sponsors" => get_post_meta($ID,"sponsors"),
					"speakers" => get_post_meta($ID,"speakers"),
					"thumbnail" => get_post_thumbnail_id($ID),
				));

			}
			return $sessions;
		}
		function getSessions(){
			global $wpdb;
			$q = $wpdb->get_results("
			select ID, post_name, post_date, post_title, post_content
			from wp_posts
			where post_type = 'conference'
			and post_parent = '0'
			and post_status='publish'
			
			order by menu_order
				");
			$sessions = array();
			foreach($q as $key => $value){
				extract((array) $value);
				array_push($sessions,
				array(
					"id" => $ID,
					"title" =>$post_title,
					"content" => $post_content,
					"slug" => $post_name,
					"start"=>get_post_meta($ID,"session_start",true),
					"end"=>get_post_meta($ID,"session_end",true),
					"sponsors" => get_post_meta($ID,"sponsors"),
					"speakers" => get_post_meta($ID,"speakers")
				));

			}
			return $sessions;
		}
		function sessionTime($start,$end){
			if(intval($start)){
			$start_time = date("g:i a",$start);
			if(@$end){
				$end_time = date("g:i a",strtotime(@$end));
			}
			return $start_time." - ".@$end_time;
			}
			return "";
		}

		
	
?>