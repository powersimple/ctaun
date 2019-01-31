<?php
$genres = getGenres();
foreach($genres as $key => $genre){
    
    print "<h3>".$genre['title']."</h3>";
   
    foreach($genre['books'] as $key=>$book)
    {
        extract($book);
        
        ?>
           
           <div class="row multi-columns-row post-columns" id="<?php print $slug?>">
                <div class="col-sm-4">
                    <img src="<?php print getThumbnail($thumbnail);?>" alt=""> 
                    <strong>Order <?php print $title?></strong><br>
                    <ul class="booklinks">
                    <?php 

                        print displayBookLinks($book);
        
?>  
                </ul>
                </div>
                <div class="col col-sm-8">
                     <h4><?php print $title?></h4>
                    <?php print $content?>
        
                  </div>

        </div>

        <?php
        //var_dump($genre['books']);
    }
    
}
    
?>