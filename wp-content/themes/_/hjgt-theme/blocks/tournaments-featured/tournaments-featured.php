<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "tournamentsFeatured", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php get_template_part( 'template_parts/tournaments', 'featured' ); ?> 
</div>