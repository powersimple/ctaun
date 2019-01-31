 <div class="panel-group archive" id="conference-playlist">
      <?php echo $content;?>
<?php

    $sessions = getPastSessions(4482);//id for 2018 hardcoded
    $speaker_session = array();
    global $speaker_session;

        

    foreach ($sessions as $key => $value) {
        extract((array) $value);
        $speaker_list = speakerList($speakers);
        $sponsor_list = sponsorList($sponsors);
        $session_time = sessionTime(@$start,@$end);
         $thumb = getThumbnail($id);
        ?>

               
               
                  <div class="panel panel-default">
                
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a class="section-scroll" href="#recap" onclick="setVideo('<?php echo $video_embed_url?>');return false;">                     <?php if($thumb != ""){ ?>
                            <div class="session-thumb">
                                <img class="session-thumbnail" src="<?php echo $thumb; ?>" alt="<?php echo $title;?>">
                            </div>
                        <?php } ?>
<?php echo $title;?>
                      </a></span></h4>
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
                          print '<a href="'.$speaker['permalink'].'" target="blank"><span class="speaker-name">'.$speaker['speaker_name'].'</span></a>';
                          
                        }
                      ?>
                       </div>
                      </div>
                    </div>
                  
                  </div>
                 
                

        <?php
    }

?>