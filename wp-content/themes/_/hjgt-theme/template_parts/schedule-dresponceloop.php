<?php

$decodedResponse = $args['decodedResponse'];
if ($decodedResponse) :
    foreach ($decodedResponse as $value):

        $tourn_name = $value['TournamentName'];
        $tourn_url = $value['TournamentUrl'];
        $tourn_id = $value['TournamentID'];
        $tourn_date = $value['TournamentDate'];
        $course_location = $value['CityState'];
        $course_name = $value['CourseName'];

        $tourn_img_url = 'https://cdn.shotstat.com/content/skin/hjgt/image/tournamentbanner/tnmtbanner'.$tourn_id.'.png';
        $file_headers = @get_headers($tourn_img_url);
        $set_transient = 'img_transient_'.$tourn_id;

        if( get_transient( $set_transient ) ) {
          $exists = get_transient( $set_transient );
        } else {
            if(!$file_headers || $file_headers[0] == 'HTTP/1.1 403 Forbidden') {
                $exists = false;
            }
            else {
                $exists = true;
            }
            set_transient( $set_transient, $exists, 30 * DAY_IN_SECONDS );
        }

        ?>
        
        <div class="blogCards">
            <div class="blogCardsContent"> 
                <a class="featureImg" href="<?php echo $tourn_url; ?>" target="_blank"> 
                    <?php if($exists) : ?>
                    <img src="<?php echo $tourn_img_url; ?>" alt="<?php echo $tourn_name; ?>" loading="lazy" width="295" height="150"/> 
                    <?php else : ?>
                    <img alt="HJGT Placeholder" src="<?php echo get_template_directory_uri().'/a_images/HGJT-Image-Placeholder.jpg'; ?>" loading="lazy" width="295" height="150"/> 
                    <?php endif; ?>
                </a> 
                <div class="date spanners">
                    <?php echo $tourn_date; ?>
                </div>
                <a class="d-flex h4 text-body title" href="<?php echo $tourn_url; ?>" target="_blank"><?php echo $tourn_name; ?></a>
                <div class="eventNameLocation spanners">
                    <span><?php echo $course_name; ?></span>
                    <span>/</span>
                    <span><?php echo $course_location; ?></span> 
                </div>         
            </div>
        </div>

    <?php endforeach; 
    
else : echo '<div class="h4 my-2">No events have been posted yet. Check back later to see next year\'s schedule!</div>'; 
endif;