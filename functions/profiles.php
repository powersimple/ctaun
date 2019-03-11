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
    function displayProfilesList($profiles){
 
        $by_letter = array();
        
        foreach($profiles as $key=> $profile){
          
           
             $letter = substr($profile->post_title, 0, 1);


            if ( ! isset($by_letter[$letter]) ){
                $by_letter[$letter] = array();
               
    
            } 
             $by_letter[$letter][] = $profile;
            if ( ! empty( $by_letter ) ) {
                //ksort($by_letter); // order the array

                // fill the array with letters have no posts
              //  $by_letter = fill_by_letter_array( $by_letter );

             //   display_letters_anchors( array_keys( $by_letter ) );

               
            }
             
 
           // extract((array) $profile);
         // print "<li><a href='/profile/$post_name'>$post_title</a></li>";   
 
        }
        print "<div class='alphanav'>
        <ul>";
        foreach( $by_letter as $letter =>$posts) {
            print "<li><a href='#$letter' class='section-scroll'>$letter</a></li>";
        }
        print "</ul>
        </div>";

        print "<div class='profile-nav'>";
        foreach( $by_letter as $letter => $posts ) {
            
            echo "<span class='letter' title='Scroll to Profiles Beginning with $letter'>$letter</span>";
            print "<ul id='$letter'>";
            foreach($by_letter[$letter] as $key => $value){
                $permalink = get_permalink($value->ID);
                print "<li><a href='$permalink'>$value->post_title</a></li>";
            }
            print '</ul>';
                echo "<a class='back-to-top section-scroll' title='Back To Top' href='#list-top'>^</a>";
           
           
        }
         print '</div>';
  
                        

       

    }

?>