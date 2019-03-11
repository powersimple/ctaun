<?php
    get_header();
    $term = get_queried_object();
    
?>
    <div class="row">
        
                <h1><?php echo $term->name;?></h1>
                <div class="col-sm-8">

               
                    <?php
                

                    $cards = getResourcesByTaxonomy('post_tag',$term->slug);
                            ?>
                  
                    
                    <div class="panel-body">
                        <?php
                       
                       
                       //echo the_content();
                       ?>
                            <ul id="resources">

                       <?php
                       
                        foreach($cards as $key => $card){
                          
                            
                            displayResourceCard($card);
                        
                            
                        }
                        


                       ?>
                        </ul>
                    
                    </div>
                            
                    
                        <?php 
                    

                    ?>
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