<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>


    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/icons/favicon.ico" />

    <!--  
    Document Title
    =============================================
    -->
    <title><?php echo get_bloginfo('name'); ?></title>
    <!--  
    Favicons
    =============================================
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    -->
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <?php 
    wp_head();
    $url = wp_upload_dir();
    global $datasource_table;
    global $class_bg;
    $class_bg = '';
    if(@$post->post_type == 'sdg'){
      $class_id = "sdg".intval(substr($post->post_title,0,2));
      $class_bg ="$class_id"."bg";

    } else if (@$post->post_type == 'page'){
      
      if($post->post_parent == 0){
        $class_bg = $post->post_name."bg";
      } else {
        $parent_name = get_post($post->post_parent)->post_name;
        $class_bg = $parent_name."bg";
      }
    } else {

    }




?>
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

   
   
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/lib/flexslider/flexslider.css" rel="stylesheet">

    <!-- Main stylesheet and color file-->
    <link href="<?php echo get_stylesheet_directory_uri();?>/style.css" rel="stylesheet">



<script>
    // Wordpress PHP variables to render into JS at outset.
    if(<?php echo @$post->ID?>){
        var active_id = <?php echo @$post->ID?>;
    } else {
      
    }
    var active_object = "<?php echo $post->post_type?>";
    var home_page = <?php echo get_option( 'page_on_front' );?>;
    var site_title = "<?php echo get_bloginfo('name');?>";
    var json_path = "<?php echo get_stylesheet_directory_uri();?>/data/";
    var uploads_path =  "<?php echo $url['baseurl']?>/";


</script>

  </head>


  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" class="<?php echo $class_bg;?>">


      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
            
        <div class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">   
          <div id="pinned-nav"></div>   
          <div id="logo" class="onpage-navigation"><img src="/images/photos/CTAUN-Logo-01.svg"></div> 

                    <div id="site-title" class="onpage-navigation"><a href="/"><span class="acronym">CTAUN</span><span class="separator">|</span><span class="name">Committee on Teaching<br>About the United Nations</span></a></div>
                    <div id="main-menu"></div>
                  
            </div>
      </div>
      
      
<?php

$hero = getHero(@$post->ID);
if($hero == ''){
  $hero = '/images/photos/GA-view.jpg';
}
 
?>
       

<?php
// include "globe.php";

if(is_front_page()){
	 ?>
	
	 
<div class="home-slide-wrap">
<section class="home-section home-parallax home-fade home-full-height" id="home">
        <div class="hero-slider">

          <ul class="slides">
          <?php
          
    $slides = get_slides($post->ID);
    foreach ($slides as $key => $media_id) {
       $src= wp_get_attachment_image_src( $media_id,"Full");
       //var_dump($src);//var_dump(get_media_data($media_id));
        extract((array) get_media_data($media_id));
        ?>

          
            <li class="bg-dark-30 bg-dark" style="background-image:url(<?php echo $src[0];?>);">
              <div class="titan-caption">
                <div class="caption-content">
                 
                  <div class="hero-slide">
                  
                  <?php echo $title?></div><a class="section-scroll btn " href="#<?php echo sanitize_title($title);?>"><?php echo wpautop($caption);
                   if($desc != ''){
                    print "<span class='desc'>$desc</span>";
                  }
                  
                  ?></a>

                </div>
              </div>
            </li>
            <?php
            }
          ?>



          </ul>
          
        </div>
      
      </section>
</div>


<?php } else { ?>
<section class="module bg-dark-60 about-page-header" data-background="<?php echo $hero;?>"></section>
  
<?php }  
  sdgMenu();
  $main_class = '';
  if(is_front_page()){
    $main_class = "whitebg";
  }
?>
   <main>
    
<div class="main">
    <section class="module">
        <div class="container">

            
                