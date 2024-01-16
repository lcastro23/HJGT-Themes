<?php
/* 
 * Paginate Advanced Custom Field repeater
 */

// ACF Loop
if( have_rows( 'featured_events' ) ) : 
$title = get_the_title();
$title = (strpos($title, 's', -1)) ? $title : $title.'s';
$subD_URL = get_field( 'subdomain_tournament_url' );
?>
<div class="container">
  <div class="cardSimple padLG">
    <div class="wp-block-tb-theme-flex-row d-flex flexRow fr_justify-content-center justify-content-between space1  mt-0 mb-0 pt-0 pb-0 flexRowTitleAndLink">
      <div class="wp-block-tb-theme-titles text-center text-sm-left h3 mb-2"> <span>Featured <?php echo $title; ?></span>  </div>
      <div class="wp-block-tb-theme-titles-links areaLink justify-content-center h5 mb-0 noArrow noFullWidth has-secondary-color has-text-color"> <a href="<?php echo esc_url($subD_URL); ?>" target="_blank">See All</a> <svg xmlns="http://www.w3.org/2000/svg" width="8.576" height="15" viewBox="0 0 8.576 15" fill="currentColor">  <path id="Arrow-Down-Icon" d="M13.685,17.238,8.013,11.561a1.067,1.067,0,0,0-1.514,0,1.081,1.081,0,0,0,0,1.518l6.426,6.431a1.07,1.07,0,0,0,1.478.031l6.471-6.458a1.072,1.072,0,1,0-1.514-1.518Z" transform="translate(-11.246 21.188) rotate(-90)"></path>  </svg>  </div>
    </div>
    <div class="pastSloop row commingUpLoop recentPostsSimpleCard">
    <?php 
    $count_rows = 0;
    while( have_rows( 'featured_events' ) && $count_rows < 3 ): the_row();                   
      
    $count_rows++;
    $tourn_name = get_sub_field( 'tournament_name_featured' );
    $golf_course_location = get_sub_field( 'course_location_featured' );
    $event_id = get_sub_field( 'event_id_featured' );
    $event_image = get_sub_field( 'event_image_featured' );
    $event_dates = get_sub_field( 'event_dates_featured' );
    $event_end_date = get_sub_field( 'event_end_date_feature' );
    $event_end_date = new DateTime($event_end_date);
    
    $today = new DateTime('today');

    $tourn_url = 'https://tournaments.hjgt.org/Tournament/TournamentDetails?TID='.$event_id;
    $tourn_img_url = 'https://cdn.shotstat.com/content/skin/hjgt/image/tournamentbanner/tnmtbanner'.$event_id.'.png';
    $file_headers = @get_headers($tourn_img_url);
    $set_transient = 'img_transient_'.$event_id;

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
    <?php if( $event_end_date > $today ) : ?>
    <div class="blogCards">
      <div class="blogCardsContent"> 
          <a class="featureImg" href="<?php echo $tourn_url; ?>" target="_blank"> 
              <?php if($event_image) : ?>
                <?php echo wp_get_attachment_image( $event_image, 'medium_large' );?>
              <?php elseif($exists) : ?>
              <img src="<?php echo $tourn_img_url; ?>" alt="<?php echo $golf_course_location; ?>"/> 
              <?php else : ?>
              <img alt="HJGT Placeholder" src="<?php echo get_template_directory_uri().'/a_images/HGJT-Image-Placeholder.jpg'; ?>"/> 
              <?php endif; ?>
          </a> 
          <div class="date spanners">
          <?php echo $event_dates; ?> 
          </div>
          <a class="d-flex h4 text-body title" href="<?php echo $tourn_url; ?>" target="_blank"><?php echo $tourn_name; ?></a>
          <div class="eventNameLocation spanners">
              <span><?php echo $golf_course_location; ?></span>
          </div>         
      </div>
  </div>
  <?php endif; ?>

    <?php endwhile;?>
    </div>
  </div>
</div>
<?php endif; ?>