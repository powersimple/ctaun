
<?php
get_header(); 
                
?>
<main class="main">
<div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h2 class="module-title font-alt"><?php echo $post->post_title?></h2>
                <div class="panel-body"><?php echo wpautop($post->post_content);?></div>
              </div>
            </div>
</main>
<?php
get_footer(); 


                    
?>
