<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "recentBlogsWrapper", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $only_post_query_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'date'
        )
    ?>
    <?php $only_post_query = new WP_Query( $only_post_query_args ); ?>
    <?php if ( $only_post_query->have_posts() ) : ?>
        <div class="recentBlogs"> 
            <?php $only_post_query_item_number = 0; ?>
            <?php while ( $only_post_query->have_posts() ) : $only_post_query->the_post(); ?>
                <?php if( $only_post_query_item_number >= 0 && $only_post_query_item_number <= 2 ) : ?>
                    <?php PG_Helper_v2::rememberShownPost(); ?>
                    <a class="mosaicBlogCard" href="<?php echo esc_url( get_permalink() ); ?>"> <div class="featureImg"> 
                            <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
                                <?php echo PG_Image::getPostImage( null, 'medium_large', null, 'both', null ) ?> 
                            <?php else : ?>
                                <img alt="Blog Placeholder" src="<?php echo get_template_directory_uri(); ?>/a_images/HGJT-Image-Placeholder.jpg"/>
                            <?php endif; ?> 
                            <div class="overlay"></div>                             
                        </div> <div class="textWrapper"> 
                            <div class="date">
                                <?php the_time( get_option( 'date_format' ) ); ?>
                            </div>                             
                            <div class="h3">
                                <?php the_title(); ?>
                            </div>                             
                            <div>
                                <?php echo get_the_excerpt(); ?>
                            </div>                             
                        </div> </a>
                <?php endif; ?>
                <?php $only_post_query_item_number++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>                           
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
</div>