<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "mb-1 mt-2 scheduleUpcomming", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <div class="commingUpLoop recentPostsSimpleCard">
        <?php get_template_part( 'template_parts/schedule', 'upcoming-four-invitational' ); ?>
    </div>     
</div>