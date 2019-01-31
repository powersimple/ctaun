
          <h2 class="font-alt module-title"><?php echo $title?></h2>
            <div class="sponsors row multi-columns-row post-columns">
                

            </div>
            <div class="row speakers-page">
              <?php
    $speakers = getSpeakers();
    foreach($speakers as $key => $speaker){
        
        displaySpeaker($speaker,"thumbnail","speaker-list");
    }
              ?>


            </div>


