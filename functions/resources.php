<?php

    function getResourcesByTaxonomy($taxonomy,$slug){
            $resources = get_posts(
            array(
                'posts_per_page' => -1,
                'post_type' => 'resource',
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $slug,
                        'orderby'=> 'name',
                        
                    )
                )
            )
        );
        $cards = array();
            foreach($resources as $key => $resource){
                array_push($cards, array(
                    "result" => array(
                            "id"=>$resource->ID,
                            "title"=>$resource->post_title,
                            "slug"=>$resource->post_name,
                            "content"=>$resource->post_content,
                            "excerpt"=>$resource->post_excerpt,
                            
                            
                        ),
                    "meta"=> getResourceMeta($resource->ID),
                    "taxes"=> getResourceTaxonomy($resource->ID,$slug)
                    )
                );
            }
        return $cards;
    }


    function tagLinks($terms){
        $tax_tags = array();
        if(count((array) $terms)){
            
        }
        return $tax_tags;
    }
    function taxLabel($taxonomy){
        switch($taxonomy){
            case "category": return "Categories:";
            break;
            case "tag_sdg": return "SDGs:";
            break;
            case "countries": return "Countries:";
            break;
            case "resource_type": return "Type:";
            break; 
            case "post_tag": return "Tags";
            break; 
            case "gradelevel": return "Grade Level";
            break; 

        }       

    }
    function getResourceTaxonomy($id,$thisSlug){
        $taxonomies = "category,countries,tag_sdg,resource_type,post_tag,gradelevel";
        $terms = array();
        $results = array();
        foreach(explode(",",$taxonomies) as $key =>$taxonomy){
            $terms[$taxonomy] =  (array) get_the_terms( $id ,  $taxonomy);
            $results[$taxonomy] = array();
            foreach($terms[$taxonomy] as $list =>$tax){
           //  extract((array) $taxonomy );
                if(@$tax->term_id && $tax->slug != @$xthisSlug ){ 

                    array_push($results[$taxonomy], array(
                        "group" =>  "|".taxLabel($taxonomy),
                        "link" => "/".$taxonomy."/$tax->slug",
                        "label" => $tax->name
                        )
                    );
                }

            }

        }
       

        return $results;

        }

        function getResourceMeta($id){

			$resource_meta = array(
                "link" => get_post_meta($id,"link",true),
                "profiles" => get_post_meta($id,"profile"),
                

			);
			


			return $resource_meta;

        }
         function displayResourceCard($card){
            extract($card);
           

            extract($result);
            extract($meta);
           // var_dump($card);
//            $types = implode(" ",);
           
            print "<article class='card'>";
            print "<a href='$link' target='_blank' class='resource-link'>";
            print $title;
            print "</a><br>";
            print "<div class='content-wrap'>";
            print $content;
            print "</div>";
            print "<span class='taxes'>";
            foreach ($taxes as $key => $tax) {
                if(count($tax)){
                print "<span class='tax-label'>".taxLabel($key)."</span> "; 
                foreach($tax as $i => $tag){;
                 
                    print "<a href='$tag[link]'>$tag[label]</a> ";
                }
                //print"<br>";
                }
            }
            print "</span>";
          
            if(count(@$profiles)){
                print "<div class='resource-profiles'>";
                foreach(@$profiles as $key => $profile_id){     
                    print "<div class='resource-profile'>";
                    
                    linkProfile($profile_id);
                    print "</div>";
                }
                print "</div>";
            }
            print "</article>";

        }
        function linkProfile($profile_id){
             extract(getMetaData($profile_id));

            $link = get_permalink($profile_id);
   

    print "<div class='profile-logo'>";
 
            
           
           $img = "<a href='$link' target='_blank' class='external external-image'>$name";
            $img .= "<img src='$logo_url' alt='$name'>";//$meta_groups['links'][$field];
            $img .= "</a>";

            print $img;
    
    print "</div>";
        }
        function displayResourceMedia($link,$taxes){
            
            //print wp_oembed_get( $link);


        }
?>