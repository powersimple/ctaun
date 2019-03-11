<?php
    get_header();
?>
    <div class="row">
        
                <h1><?php echo $post->post_title;?></h1>
                <div class="col-sm-8">
           
               
                    <?php
                     
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                    
                            the_post(); 
                           
                            ?>
                  
                    
                    <div class="panel-body">
                            
                    <?php
                        global $wpdb;
                        $sql = "select id,post_id, title, link, description from resource_data ";
                        $q = $wpdb->get_results($sql);
                        $counter = 5131;
                        foreach($q as $key => $value){
                           print "<BR>";
                           extract((array) $value);
                           print "$value->id  $value->title";
                            
                    //        add_post_meta( $value->post_id, 'link', $value->link, true );
                       
                          
                            // print $value->title."<BR>$value->description";
                       
                        }?>
                    
                    
                    </div>
                            
                    
                        <?php }
                    }

                    ?>
                </div>
                <div class="col-sm-4 col-md-3  sidebar scaffold">
                    <div class="box">
                        
                        <?php dynamic_sidebar("page-sidebar");?>
                    </div>
                
            </div>
    </div>
<?php
    get_footer();
?>                                                                   