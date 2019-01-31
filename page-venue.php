
<div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h2 class="module-title font-alt"><?php echo $title?></h2>
                <div class="panel-body"><?php echo wpautop($content);?></div>
              </div>
            </div>
<div class="gallery-wrap">
    <div class="slider slideshow">
    <?php
    $slides = get_slides($ID);
    foreach ($slides as $key => $media_id) {
       $src= wp_get_attachment_image_src( $media_id,"Full");
       //var_dump($src);//var_dump(get_media_data($media_id));

        //extract((array) get_media_data($media_id));
        ?>
        <div>
            <img src="<?php echo $src[0];?>" alt="National Black Theatre">
        </div>
        <?php
            }
          ?>

    </div>
</div>
        
<div class="row">


</div>