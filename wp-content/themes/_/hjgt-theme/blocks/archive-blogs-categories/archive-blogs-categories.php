<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "ourBlogsCards", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $term = get_queried_object();
        $termID = $term->term_taxonomy_id;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;   
        $per_page = 8;   
     ?> 
    <?php
        $post_cat_query_args = array(
            'cat' => $termID,
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'posts_per_archive_page' => $per_page,
            'paged' => $paged,
            'order' => 'DESC'
        )
    ?> 
    <?php
        $post_cat_query_args['orderby'] .= 'date title';
    ?> 
    <?php $post_cat_query = new WP_Query( $post_cat_query_args ); ?>
    <?php if ( $post_cat_query->have_posts() ) : ?>
        <div class="categoryArchive recentPostsSimpleCard"> 
            <?php while ( $post_cat_query->have_posts() ) : $post_cat_query->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'blogCards' ); ?>> 
                    <div class="blogCardsContent"> <a class="featureImg" href="<?php echo esc_url( get_permalink() ); ?>"> <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?><?php echo PG_Image::getPostImage( null, 'medium_large', null, 'both', null ) ?> <?php else : ?><img alt="Blog Placeholder" src="<?php echo get_template_directory_uri(); ?>/a_images/HGJT-Image-Placeholder.jpg"/><?php endif; ?> </a> 
                        <div class="date"> <span><?php the_time( get_option( 'date_format' ) ); ?></span> 
                        </div>                         <a class="d-flex h4 text-body title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a> 
                    </div>                     
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>                           
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
    <?php if ( PG_Pagination::isPaginated($post_cat_query) ) : ?>
        <div class="pagination"> <a class="<?php if(!( PG_Pagination::getCurrentPage() > 1 )) echo 'disabled'; ?> prev" <?php echo PG_Pagination::getPreviousHrefAttribute( $post_cat_query ); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
            <div class="numbers">                  
                <?php for( $page_num = 1; $page_num <= PG_Pagination::getMaxPages( $post_cat_query ); $page_num++) : ?>
                    <?php if( $page_num == PG_Pagination::getCurrentPage() ) : ?>
                        <a class="active page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php else : ?>
                        <a class="<?php if( $page_num == PG_Pagination::getCurrentPage() ) echo 'active'; ?> page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php endif; ?>
                <?php endfor; ?> 
            </div>             <a class="<?php if(!( PG_Pagination::getCurrentPage() < PG_Pagination::getMaxPages( $post_cat_query ) )) echo 'disabled'; ?> next" <?php echo PG_Pagination::getNextHrefAttribute( $post_cat_query ); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
        </div>
    <?php endif; ?> 
</div>