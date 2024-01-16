<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "ourBlogsCards", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $thisState = get_field( 'select_state' )['label'];
        $thisStateID = get_field( 'select_state' )['value'];
        $recent_states_query_args = array(
            'post_type' => 'result',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'meta_value_num',
            'meta_key' => 'event_end_date',
            'meta_query' => array(
                array(
                'key' => 'state_location',
                'value' => $thisState
                ),
            )
        )
    ?> 
    <?php $recent_states_query = new WP_Query( $recent_states_query_args ); ?>
    <div> 
        <?php if ( $recent_states_query->have_posts() ) : ?>
            <div class="container"> 
                <div class="cardSimple padLG"> 
                    <div class="d-flex flexRow flexRowTitleAndLink fr_justify-content-center justify-content-between mb-2 mt-0 pb-0 pt-0 space1 wp-block-tb-theme-flex-row"> 
                        <div class="wp-block-tb-theme-titles text-center text-sm-left h3"> <span><?php _e( 'Recent Results in', 'tb_theme' ); ?> <?php echo get_the_title(); ?></span> 
                        </div>                         
                        <div class="wp-block-tb-theme-titles-links areaLink justify-content-center h5 mb-0 noArrow noFullWidth has-secondary-color has-text-color"> <a href="<?php echo esc_url( get_site_url().'/result/?state='.$thisState ); ?>"><?php _e( 'See All', 'tb_theme' ); ?></a> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="8.576" height="15" viewBox="0 0 8.576 15" fill="currentColor"> 
                                <path id="Arrow-Down-Icon" d="M13.685,17.238,8.013,11.561a1.067,1.067,0,0,0-1.514,0,1.081,1.081,0,0,0,0,1.518l6.426,6.431a1.07,1.07,0,0,0,1.478.031l6.471-6.458a1.072,1.072,0,1,0-1.514-1.518Z" transform="translate(-11.246 21.188) rotate(-90)"></path>                                 
                            </svg>                             
                        </div>                         
                    </div>                     
                    <?php if ( $recent_states_query->have_posts() ) : ?>
                        <div class="commingUpLoop recentPostsSimpleCard"> 
                            <?php $recent_states_query_item_number = 0; ?>
                            <?php while ( $recent_states_query->have_posts() ) : $recent_states_query->the_post(); ?>
                                <?php if( $recent_states_query_item_number >= 0 && $recent_states_query_item_number <= 3 ) : ?>
                                    <?php PG_Helper_v2::rememberShownPost(); ?>
                                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'blogCards' ); ?>> 
                                        <?php
                                            $event_start_date = get_field('event_start_date');
                                            $event_end_date = get_field('event_end_date');
                                            $event_image = get_field('event_image');
                                            $event_id = get_field('event_id');
                                            $golf_course_location = get_field('golf_course_location');
                                        ?> 
                                        <div class="blogCardsContent"> <a class="featureImg" href="<?php echo esc_url( get_permalink() ); ?>"> <?php
                                                    $tourn_img_url = 'https://cdn.shotstat.com/content/skin/hjgt/image/tournamentbanner/tnmtbanner'.$event_id.'.png';
                                                        $file_headers = @get_headers($tourn_img_url);
                                                        $set_transient = 'img_transient_'.$event_id;
                                                    
                                                        if( get_transient( $set_transient ) ) {
                                                          $exists = get_transient( $set_transient );
                                                        } else {
                                                            if(!$file_headers || $file_headers[0] == 'HTTP/1.1 403 Forbidden') {
                                                                $exists = false;
                                                            }
                                                            else {
                                                                $exists = true;
                                                            }
                                                            set_transient( $set_transient, $exists, 30 * DAY_IN_SECONDS );
                                                        }
                                                ?><?php if ( $event_image ) : ?><?php echo wp_get_attachment_image( $event_image, 'xl_large' ); ?><?php elseif ( $exists ) : ?><img alt="<?php echo $golf_course_location ?>" src="<?php echo $tourn_img_url ?>" loading="lazy"/><?php else : ?><img alt="Blog Placeholder" src="<?php echo get_template_directory_uri(); ?>/a_images/HGJT-Image-Placeholder.jpg" loading="lazy"/><?php endif; ?> </a> 
                                            <?php if ( $event_start_date ) : ?>
                                                <div class="date"> <span><?php echo $event_start_date; ?></span> <span>-</span> <span><?php echo $event_end_date; ?></span> 
                                                </div>
                                            <?php endif; ?> <a class="d-flex h4 text-body title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a> 
                                            <div>
                                                <?php echo $golf_course_location ?>
                                            </div>                                             
                                        </div>                                         
                                    </div>
                                <?php endif; ?>
                                <?php $recent_states_query_item_number++; ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?> 
                        </div>
                    <?php else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
                    <?php endif; ?> 
                </div>                 
            </div>
        <?php endif; ?> 
    </div>     
</div>