<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "postCatWrapper", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $terms = get_terms( array(
            'taxonomy' => 'category',
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => true
    ) ) ?>
    <?php if( !empty( $terms ) && !is_wp_error( $terms ) ) : ?>
        <div class="postCategoriesBtns"> 
            <?php foreach( $terms as $term ) : ?>
                <a class="btn btn-outline-primary natural" href="<?php echo esc_url( get_term_link( $term ) ); ?>" rel="tag"><?php echo $term->name; ?></a>
            <?php endforeach; ?> 
        </div>
    <?php endif; ?> 
</div>