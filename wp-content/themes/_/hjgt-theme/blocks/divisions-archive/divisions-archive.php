<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "divisionsArchive container", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $divisions_archive_query_args = array(
            'post_type' => 'player-divisions',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'menu_order'
        )
    ?>
    <?php $divisions_archive_query = new WP_Query( $divisions_archive_query_args ); ?>
    <?php if ( $divisions_archive_query->have_posts() ) : ?>
        <div class="row"> 
            <?php while ( $divisions_archive_query->have_posts() ) : $divisions_archive_query->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-6' ); ?>> 
                    <div class="featureImg"> 
                        <?php echo PG_Image::getPostImage( null, 'large', null, 'both', null ) ?> 
                    </div>                     
                    <div class="h6 mb-1 text-secondary yards">
                        <?php echo get_field( 'division_yards' ); ?>
                    </div>                     
                    <div class="h3 mb-1 title">
                        <?php the_title(); ?>
                    </div>                     
                    <div class="excerpt mb-1">
                        <?php echo get_the_excerpt(); ?>
                    </div>                     
                    <div class="d-flex jr_guten_btn_wrap"> <a class="btn btn-outline-secondary jr_guten_btn tColorBlack" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Learn More', 'tb_theme' ); ?></a> 
                    </div>                     
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
</div>