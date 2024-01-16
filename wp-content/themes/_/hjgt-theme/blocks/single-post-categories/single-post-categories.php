<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "categoriesBtns", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $post_id = get_the_ID();
        $categories = get_the_category($post_id);
    ?> 
    <?php if ( $categories ) : ?>
        <?php $terms = get_the_terms( get_the_ID(), 'category' ) ?>
        <?php if( !empty( $terms ) ) : ?>
            <div class="categories mb-2"> 
                <?php foreach( $terms as $term ) : ?>
                    <a class="category" href="<?php echo esc_url( get_term_link( $term, 'category' ) ) ?>"><?php echo $term->name; ?></a>
                <?php endforeach; ?> 
            </div>
        <?php endif; ?>
    <?php endif; ?> 
</div>