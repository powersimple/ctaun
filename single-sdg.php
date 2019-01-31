<?php
    get_header();

    $class_id = "sdg".intval(substr($post->post_title,0,2))."bg";
?>
<div class="<?php echo $class_id?>">
    <div class="row">
        
                <h1 class="reverse"><?php echo $post->post_title;?></h1>
                <div class="col-sm-8">

               
                    <?php

                    $cards = getResourcesByTaxonomy('nav_sdg',$post->post_name);
                    
                            ?>
                  
                    
                    <div class="panel-body">
                        <?php
                       
                       
                      
                       ?>
                            <div id="resources" >

                       <?php
                       
                        foreach($cards as $key => $card){
                          
                            
                            displayResourceCard($card);
                        
                            
                        }
                        


                       ?>
                        </div>
                    
                    </div>
                            
                    
                        <?php 
                    

                    ?>
                </div>
                <aside class="col-sm-4 col-md-3 <?php echo $class_id?> <?php echo $class_id.'box'?> scaffold reverse">
                    <div class="box">
                        <?php
                        $src = getThumbnail($post->ID);
                            print "<img src='$src' alt='$post->post_title icon' class='sdg-icon'>";
                        ?>
                        <?php dynamic_sidebar("sdg_subnav");?>
                </aside>
                
            </div>
    </div>
                </div>
<?php
    get_footer();
?>                                                                   