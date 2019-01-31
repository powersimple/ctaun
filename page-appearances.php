<?php
$mediums = getMediums();
foreach($mediums as $key => $medium){
    
    print "<h3>".$medium['title']."</h3>";
   
    foreach($medium['appearances'] as $key=>$appearance)
    {
        extract($appearance);
        
        ?>
           
           <div class="row multi-columns-row post-columns"  id="<?php print $slug?>">
                <div class="col-sm-4">
                    <img src="<?php print getThumbnail($thumbnail);?>" alt=""> 
                </div>
                <div class="col col-sm-8">
                    
                        
                        
                             <?php

                        if ($external_url != ''){
                              print "<a target='_blank' href='$external_url'>
                                <h4>$title</h4>

                              <strong>$appearance</strong></a><BR>";
                              
                        } else {
                             print "<h4>".$title."</h4>";
                            print "<strong>$appearance</strong>";
                           

                        }
                    
                    print $content; 

                        if($embed_url != ''){
                            ?>
                                <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="<?=$embed_url?>"></iframe>
                                    <?php
                        } 
                        
                    ?>
            

                  </div>

        </div>

        <?php
        //var_dump($medium['books']);
    }
    
}
    
?>