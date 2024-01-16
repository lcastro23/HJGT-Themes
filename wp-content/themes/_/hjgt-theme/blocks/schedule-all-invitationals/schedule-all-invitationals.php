<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "scheduleAllCats", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $keyword= PG_Blocks::getAttribute( $args, 'event_keyword' ); ?>
    <div class="allCatsLoop commingUpLoop recentPostsSimpleCard">
        <?php get_template_part( 'template_parts/schedule', 'all-invitationals', array(
                'event_keyword' => $keyword
        ) ); ?>
    </div>     
</div>