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
                        <div class="top-spacer"></diV>
                    <div class="panel-content">
                        
                        <?php
                       $profile_meta = getMetaData($post->ID);

displayExternalLinks($profile_meta);
                       print "<br>";
                       echo the_content();
                      
                        
                       ?>
                    
                    
                    </div>
                            
                    
                        <?php }
                    }

                    ?>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3  sidebar scaffold reverse">
                    <div class="box">
                        
                                                <?php dynamic_sidebar("page-sidebar");?>

                    </div>
                
            </div>
    </div>
<?php
    get_footer();
?>                                                                   