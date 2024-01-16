<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "archiveMain", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php if ( have_posts() ) : ?>
        <div class="recentPostsSimpleCard"> 
            <?php while ( have_posts() ) : the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'blogCards' ); ?>> 
                    <div class="blogCardsContent"> 
                        <?php $terms = get_the_terms( get_the_ID(), 'category' ) ?>
                        <?php if( !empty( $terms ) ) : ?>
                            <div class="categories"> 
                                <?php foreach( $terms as $term ) : ?>
                                    <a class="category" href="<?php echo esc_url( get_term_link( $term, 'category' ) ) ?>"><?php echo $term->name; ?></a>
                                <?php endforeach; ?> 
                            </div>
                        <?php endif; ?> <a class="d-flex h4 text-body title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a> 
                        <div class="date"> <span><?php _e( 'Posted on', 'tb_theme' ); ?></span> <span></span> <span><?php the_time( get_option( 'date_format' ) ); ?></span> 
                        </div>                         
                        <div class="d-flex jr_guten_btn_wrap"> 
                            <div class="linkArrow black"> <a href="<?php echo esc_url( get_permalink() ); ?>" target="_self" rel="noopener"><?php _e( 'Explore&nbsp;', 'tb_theme' ); ?><span><?php $postType = get_post_type_object(get_post_type());
                                            if ($postType) {
                                                echo esc_html($postType->labels->singular_name);
                                        } ?></span></a> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501"> 
                                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                                </svg>                                 
                            </div>                             
                        </div>                         
                    </div>                     
                </article>
            <?php endwhile; ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
    <?php if ( PG_Pagination::isPaginated() ) : ?>
        <div class="pagination"> <a class="<?php if(!( PG_Pagination::getCurrentPage() > 1 )) echo 'disabled'; ?> prev" <?php echo PG_Pagination::getPreviousHrefAttribute(); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
            <div class="numbers">                  
                <?php for( $page_num = 1; $page_num <= PG_Pagination::getMaxPages(); $page_num++) : ?>
                    <?php if( $page_num == PG_Pagination::getCurrentPage() ) : ?>
                        <a class="active page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php else : ?>
                        <a class="<?php if( $page_num == PG_Pagination::getCurrentPage() ) echo 'active'; ?> page" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                    <?php endif; ?>
                <?php endfor; ?> 
            </div>             <a class="<?php if(!( PG_Pagination::getCurrentPage() < PG_Pagination::getMaxPages() )) echo 'disabled'; ?> next" <?php echo PG_Pagination::getNextHrefAttribute(); ?>><svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                    <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
                </svg></a> 
        </div>
    <?php endif; ?> 
</div>