<?php
/* 
 * Paginate Advanced Custom Field repeater
 */

// ACF Loop
if( have_rows( 'past_signees' ) ) : ?>

<div class="pastSloop row">

  <?php while( have_rows( 'past_signees' ) ): the_row();                   
    
  $golfer_name = get_sub_field( 'players_full_name' );
  $college = get_sub_field( 'college_university' );
  ?>

    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="cardSimple padSM">
            <div class="colUnName"><?php echo $college; ?></div>
            <div><?php echo $golfer_name; ?></div>
        </div>
    </div>

  <?php endwhile;?>

</div>

<?php else: ?>

  <div class="h5">No signees found.</div>

<?php endif; ?>