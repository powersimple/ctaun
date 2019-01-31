<?php
    get_header();

  // print importMeta("profile","profile_data",3,4886);
?>
<style>
    .odd{background-color:#ccc;}

    </style>
<?php /*
    global $wpdb;
                        $sql = "select id, category_topic, countries, type, profile_entity, title, link, description from resource_data ";
                        $q = $wpdb->get_results($sql);
                        $counter = 1;
                        print "<table>";
                        foreach($q as $key => $value){
                            $class=" class='odd'";
                            if(($counter/2) == intval($counter/2)){
                                $class=" class='even'";
                            }

                           extract((array) $value);
                           ?>
                           <tr <?=$class?>>
                               <td><?=$value->id?></td>
                               <td><a href="<?=$value->link?>" target="_blank"><?=$value->title?></a></td>
                            <td><?=$value->category_topic?></td>
                            <td><?=$value->countries?></td>
                            <td><?=$value->type?></td>
                            <td><?=$value->profile_entity?></td>
                        </tr>
                           
                           <?php
                            
                          
                            // print $value->title."<BR>$value->description";
                       
                        }
                        print "</table>";*/
?>
    <div class="row">
        
                <h1><?php echo $post->post_title;?></h1>
                <div class="col-sm-8 text-body">
           
               
                    <?php

         if ( have_posts() ) {
                        while ( have_posts() ) {
                    
                            the_post(); 
                           
                            ?>
                  
                    
                    <div class="panel-body">


<?php
                      

                        // Insert the post into the database

                     //  echo the_content()?>
                    
                    
                    </div>
                            
                    
                        <?php }
                    }



    $img = getFeaturedImage($post->ID,"medium_large");
    extract($img);
        //local hero
           if($src != ''){
             print "<div class='featured'>";
          //   print "<img src='$src' alt=''>";
                if($caption != ''){
               
                print "<caption>$caption</caption></div>";
               }
               if($desc != ''){
                   print "<div class='img-desc'>$desc</div>";

               }
              
           }
                     
                    //   echo the_content()?>
                    
                    
                    </div>
                            
                    
                      
                </div>
                <div class="col-sm-4 col-md-3  sidebar scaffold">
                    <div class="box">
                        <?php //dynamic_sidebar("page-sidebar");?>
                    </div>
                
            </div>
    </div>
<?php
    
    get_footer();

?>                                                                   