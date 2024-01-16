<?php
/* 
 * Paginate Advanced Custom Field repeater
 */

// ACF Loop
if( have_rows( 'where_now' ) ) : ?>

<div class="recentPostsSimpleCard"> 

  <?php while( have_rows( 'where_now' ) ): the_row();                   
    
  $golfer_name = get_sub_field( 'player_full_name' );
  $tour_name = get_sub_field( 'tour_name' );
  $tour_logo = get_sub_field( 'tour_logo' );
  ?>

    <div class="blogCards"> 
        <div class="blogCardsContent"> 
            <div class="featureImg"> <?php echo wp_get_attachment_image( $tour_logo, 'medium' );?> </div>
            <div class="tour"><?php echo $tour_name;?></div>
            <div><?php echo $golfer_name;?></div>                                       
        </div>         
    </div>     

  <?php endwhile;?>

</div>

<?php else: ?>

  <div class="h5">No signees found.</div>

<?php endif; ?>