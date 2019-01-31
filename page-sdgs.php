<?php
    get_header();
?>
<main class="main">
    <section class="module">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
           
               
                    <?php 

                    if ( have_posts() ) {
                        while ( have_posts() ) {
                    
                            the_post(); 
                           
                            ?>
                    
                    <h2 class="module-title font-alt">
                        
                    
                    <?php echo the_title()?></h2>
                    
                    <div class="panel-body">
                        <?php
                                              echo the_content();

                        ?>
                    
                    
                    </div>
                            
                    
                        <?php }
                    }

                    ?>
            </div>
        </div>
    </section>
</main>
<?php
    get_footer();
?>