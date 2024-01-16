<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "scheduleAllCats", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $keyword= PG_Blocks_v2::getAttribute( $args, 'event_keyword' );
$category= PG_Blocks_v2::getAttribute( $args, 'event_category' ); ?>
    <div class="allCatsLoop commingUpLoop recentPostsSimpleCard">
        <?php get_template_part( 'template_parts/schedule', 'all-events', array(
                'event_keyword' => $keyword,
                'event_category' => $category
        ) ); ?>
    </div>     
</div>