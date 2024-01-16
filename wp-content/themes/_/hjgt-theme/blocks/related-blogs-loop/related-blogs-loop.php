<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "ourBlogsCards", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $term = get_queried_object();
    $termID = $term->term_taxonomy_id; ?> 
    <?php
        $related_post_query_args = array(
            'cat' => $termID,
            'post_type' => 'post',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'date'
        )
    ?>
    <?php $related_post_query = new WP_Query( $related_post_query_args ); ?>
    <div> 
        <?php if ( $related_post_query->have_posts() ) : ?>
            <div class="cardSimple padLG"> 
                <div class="head"> 
                    <div class="h3 mb-0">
                        <?php _e( 'Related Posts', 'tb_theme' ); ?>
                    </div>                     <a class="seeMore" href="<?php echo esc_url( get_home_url( null, '/blog/' ) ); ?>"><?php _e( 'See All Blogs', 'tb_theme' ); ?></a> 
                </div>                 
                <?php if ( $related_post_query->have_posts() ) : ?>
                    <div class="recentPostsSimpleCard relatedBlogs"> 
                        <?php $related_post_query_item_number = 0; ?>
                        <?php while ( $related_post_query->have_posts() ) : $related_post_query->the_post(); ?>
                            <?php if( $related_post_query_item_number >= 0 && $related_post_query_item_number <= 2 ) : ?>
                                <?php PG_Helper_v2::rememberShownPost(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'blogCards' ); ?>> 
                                    <div class="blogCardsContent"> <a class="featureImg" href="<?php echo esc_url( get_permalink() ); ?>"> <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?><?php echo PG_Image::getPostImage( null, 'medium', null, 'both', null ) ?> <?php else : ?><img alt="Blog Placeholder" src="<?php echo get_template_directory_uri(); ?>/a_images/HGJT-Image-Placeholder.jpg"/><?php endif; ?> </a> 
                                        <div class="date"> <span><?php the_time( get_option( 'date_format' ) ); ?></span> 
                                        </div>                                         <a class="d-flex h4 text-body title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a> 
                                    </div>                                     
                                </article>
                            <?php endif; ?>
                            <?php $related_post_query_item_number++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>                                                   
                    </div>
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
                <?php endif; ?> 
            </div>
        <?php endif; ?> 
    </div>     
</div>