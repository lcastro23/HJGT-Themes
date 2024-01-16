<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "academyArchive ourBlogsCards", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
        $per_page = 24;   
        $default_offset = 0;    
        if ($paged == 1) {$offset = $default_offset; } 
    else {$offset = (($paged - 1) * $per_page) + $default_offset;  } ?> 
    <?php
        $queryCategory = $_GET['category'];
        $queryState = $_GET['state'];
        
        $categoryArray = array(
            'taxonomy' => 'partner-category',
            'field' => 'term_id',
            'terms' => $queryCategory,
            );
        
        $stateArray = array(
            'taxonomy' => 'academy-state',
            'field' => 'term_id',
            'terms' => $queryState,
            );
        
        $meta_query = array();
        
        if ($queryCategory && $queryCategory != 'all') {
            $meta_query[] = $categoryArray;
        }
        
        if ($queryState && $queryState != 'all') {
            $meta_query[] = $stateArray;
        }
        
        if ( count($meta_query) > 1) {
            $meta_query['relation'] = 'AND';
        }
        
    ?> 
    <?php
        $academy_p_query_args = array(
            'post_type' => 'academy-partner',
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'paged' => $paged,
            'ignore_sticky_posts' => true,
            'order' => 'ASC'
        )
    ?> 
    <?php
        $academy_p_query_args['orderby'] .= 'menu_order date';
        if ($meta_query) {
            $academy_p_query_args['tax_query'] = $meta_query;
        }
    ?> 
    <?php $academy_p_query = new WP_Query( $academy_p_query_args ); ?>
    <?php if ( $academy_p_query->have_posts() ) : ?>
        <div class="recentPostsSimpleCard"> 
            <?php while ( $academy_p_query->have_posts() ) : $academy_p_query->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'blogCards' ); ?>> 
                    <div class="blogCardsContent"> <a class="featureImg" href="<?php echo esc_url( get_field( 'academy_partner_website_url' ) ); ?>" target="_blank"> <?php echo wp_get_attachment_image(get_field( 'academy_partner_logo' ), 'full' );
                            ?> </a> 
                    </div>                     
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
    <?php if ( PG_Pagination::isPaginated($academy_p_query) ) : ?>
        <div class="pagination"> <a class="<?php if(!( PG_Pagination::getCurrentPage() > 1 )) echo 'disabled'; ?> prev" <?php echo PG_Pagination::getPreviousHrefAttribute( $academy_p_query ); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
            <div class="numbers">                  
                <?php for( $page_num = 1; $page_num <= PG_Pagination::getMaxPages( $academy_p_query ); $page_num++) : ?>
                    <?php if( $page_num == PG_Pagination::getCurrentPage() ) : ?>
                        <a class="active page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php else : ?>
                        <a class="<?php if( $page_num == PG_Pagination::getCurrentPage() ) echo 'active'; ?> page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php endif; ?>
                <?php endfor; ?> 
            </div>             <a class="<?php if(!( PG_Pagination::getCurrentPage() < PG_Pagination::getMaxPages( $academy_p_query ) )) echo 'disabled'; ?> next" <?php echo PG_Pagination::getNextHrefAttribute( $academy_p_query ); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
        </div>
    <?php endif; ?> 
</div>