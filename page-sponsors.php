
          <h2 class="font-alt module-title"><?php echo $title?></h2>
            <div class="sponsors row multi-columns-row post-columns">
                <?php
                    displaySponsors(getSponsorLevel('Terrabit'));
                    displaySponsors(getSponsorLevel('Gigabit'));
                    displaySponsors(getSponsorLevel('Megabit'));
                    displaySponsors(getSponsorLevel('Community'));

                    ?>


            </div>
            <div class="row">
                <?php
                  

                    
                    print wpautop($content);

                    ?>


            </div>


