<?php
    function getProfiles(){
        global $wpdb;

    	
		
			$q = $wpdb->get_results("
			select ID, post_name, post_date, post_excerpt, post_title, post_content
			from wp_posts
			where post_type = 'profile'
			order by post_title
                ");
                
        $profiles = array();
           
			foreach($q as $key=> $profile){
				array_push($profiles,$profile);
				
            }
            return $profiles;

		

    }
    function displayProfiles($profiles){
        print "<ul>";
        foreach($profiles as $key=> $profile){
    
            extract((array) $profile);
          print "<li><a href='/profile/$post_name'>$post_title</a></li>";   
        }
        print "</ul>";

    }
?>