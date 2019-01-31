<h2 class="font-alt module-title"><?php echo $title?></h2>
 <div class="playlist-group" id="accordion">
<?php
    $sessions = getSessions($id);
    $speaker_session = array();
    global $speaker_session;

        

    foreach ($sessions as $key => $value) {
        extract((array) $value);
        $speaker_list = speakerList($speakers);
        $sponsor_list = sponsorList($sponsors);
        $session_time = sessionTime(@$start,@$end);
        ?>

               
               
                  <div class="panel panel-default">
                 
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $slug?>"><?php echo $title?></a><span class="session-time"><?php echo $session_time; ?></span></h4>
                       <div class="session-listing">
                       
                    <div class="panel-speakers">
                      <?php
                      if(count($speaker_list)>0){
                        print "with ";
                      }

                    foreach($speaker_list as $key=>$speaker){
                      $id = $speaker['id'];
                     $speaker_session[$id] = $title;
                      if(($key == count($speaker_list)-1) && ($key != 0)){
                        print " and ";
                      } else if($key == 0){
                        
                      } else {
                        print ", ";
                      }
                      print '<span class="speaker-name">'.$speaker['speaker_name'].'</span>';
                      
                    }
                  ?>
                    </div>
                  </div>
                    </div>
                    
                    <div class="panel-collapse collapse" id="<?php echo $slug?>">
                      <div class="panel-body">
                      <span class="mobile-session-time"><?php echo $session_time; ?></span>  
                      <p><?php echo wpautop($content)?></p>
                        
                    <?php
                        foreach($speaker_list as $key=>$speaker){
                           ?>
                            <div class="speaker-listing">
                           <?php
                          
                            displaySpeaker($speaker,"thumbnail","short");
                              print "</div>";
                        }
                        if(count($sponsors)){
                          print '<div class="session-sponsors">';
                          foreach($sponsor_list as $key=>$sponsor){
                            ?>
                             <div class="session-sponsor">
                            <?php
                           
                              displaySponsor($sponsor,"thumbnail","short");
                               print "</div>";
                         }
                         print '</div>';
                        }
                        
                        
                    ?>  
                       
                      </div>
                    </div>
                  </div>
                 
                

        <?php
    }

?>
</div>