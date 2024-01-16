<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "smallImgSliderWrapper", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $partner_query_args = array(
            'post_type' => 'corporate-partner',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'modified'
        )
    ?>
    <?php $partner_query = new WP_Query( $partner_query_args ); ?>
    <?php if ( $partner_query->have_posts() ) : ?>
        <div class="smallImgSlider wrapper"> 
            <?php while ( $partner_query->have_posts() ) : $partner_query->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'box' ); ?>> 
                    <?php $corpP= get_field('corporate_partner_logo');
                        $size = 'medium';
                        
                        if( $corpP) {
                            echo wp_get_attachment_image( $corpP, $size );
                    } ?> 
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>                                        
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
</div>