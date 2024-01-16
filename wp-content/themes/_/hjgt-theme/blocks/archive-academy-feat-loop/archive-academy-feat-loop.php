<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "academyArchive academyArchiveFeature ourBlogsCards", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $academy_p_feature_query_args = array(
            'post_type' => 'academy-partner',
            'post_status' => 'publish',
            'ignore_sticky_posts' => true,
            'order' => 'DESC',
            'orderby' => 'date',
            'meta_key' => 'featured_partner',
            'meta_value' => '1'
        )
    ?>
    <?php $academy_p_feature_query = new WP_Query( $academy_p_feature_query_args ); ?>
    <?php if ( $academy_p_feature_query->have_posts() ) : ?>
        <div class="recentPostsSimpleCard"> 
            <?php $academy_p_feature_query_item_number = 0; ?>
            <?php while ( $academy_p_feature_query->have_posts() ) : $academy_p_feature_query->the_post(); ?>
                <?php if( $academy_p_feature_query_item_number >= 0 && $academy_p_feature_query_item_number <= 3 ) : ?>
                    <?php PG_Helper_v2::rememberShownPost(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'blogCards' ); ?>> <a class="featureImg" href="<?php echo esc_url( get_field( 'academy_partner_website_url' ) ); ?>" target="_blank"> <?php echo wp_get_attachment_image(get_field( 'academy_partner_logo' ), 'full' );
                            ?> </a> 
                    </div>
                <?php endif; ?>
                <?php $academy_p_feature_query_item_number++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
</div>