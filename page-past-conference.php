<h2 id="recap" class="module-title font-alt">2018 Conference Recap</h2>
<div class="video-wrap">
<iframe id="video-player" src="https://livestream.com/accounts/686369/events/8420564/videos/182703001/player
"></iframe></div>
 <div class="panel-group archive" id="conference-playlist">
<?php

    $sessions = getPastSessions(37);//id for 2018 hardcoded
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
                      <h4 class="panel-title font-alt"><a class="section-scroll" href="#recap" onclick="setVideo('<?php echo $video_embed_url?>');return false;">
                                            <img class="session-thumbnail" src="<?php echo getThumbnail($thumbnail);?>" alt="<?php echo $title;?>">

                      <?php echo $title?></a></span></h4>
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