<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "corporateArchive ourBlogsCards", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;   
        $per_page = 24;   
        $default_offset = 0;    
        if ($paged == 1) {$offset = $default_offset; } 
    else {$offset = (($paged - 1) * $per_page) + $default_offset;  } ?> 
    <?php
        $corporate_p_query_args = array(
            'post_type' => 'corporate-partner',
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'posts_per_archive_page' => $per_page,
            'offset' => $offset,
            'paged' => $paged,
            'ignore_sticky_posts' => true,
            'order' => 'DESC',
            'orderby' => 'menu_order'
        )
    ?>
    <?php $corporate_p_query = new WP_Query( $corporate_p_query_args ); ?>
    <?php if ( $corporate_p_query->have_posts() ) : ?>
        <div class="recentPostsSimpleCard"> 
            <?php while ( $corporate_p_query->have_posts() ) : $corporate_p_query->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'blogCards' ); ?>> 
                    <div class="blogCardsContent"> <a class="featureImg" href="<?php echo esc_url( get_field( 'corporate_partner_website' ) ); ?>" target="_blank"> <?php echo wp_get_attachment_image(get_field( 'corporate_partner_logo' ), 'full' );
                            ?> </a> 
                        <div class="bioContent">
                            <?php echo get_field( 'short_corporate_bio' ); ?>
                        </div>                         
                        <div class="d-flex jr_guten_btn_wrap justify-content-center"> <a class="btn btn-outline-secondary jr_guten_btn tColorBlack" href="<?php echo esc_url( get_field( 'corporate_partner_website' ) ); ?>" target="_blank" rel="noopener"><?php _e( 'Visit Website', 'tb_theme' ); ?></a> 
                        </div>                         
                    </div>                     
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
    <?php if ( PG_Pagination::isPaginated($corporate_p_query) ) : ?>
        <div class="pagination"> <a class="<?php if(!( PG_Pagination::getCurrentPage() > 1 )) echo 'disabled'; ?> prev" <?php echo PG_Pagination::getPreviousHrefAttribute( $corporate_p_query ); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
            <div class="numbers">                  
                <?php for( $page_num = 1; $page_num <= PG_Pagination::getMaxPages( $corporate_p_query ); $page_num++) : ?>
                    <?php if( $page_num == PG_Pagination::getCurrentPage() ) : ?>
                        <a class="active page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php else : ?>
                        <a class="<?php if( $page_num == PG_Pagination::getCurrentPage() ) echo 'active'; ?> page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php endif; ?>
                <?php endfor; ?> 
            </div>             <a class="<?php if(!( PG_Pagination::getCurrentPage() < PG_Pagination::getMaxPages( $corporate_p_query ) )) echo 'disabled'; ?> next" <?php echo PG_Pagination::getNextHrefAttribute( $corporate_p_query ); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
        </div>
    <?php endif; ?> 
</div>