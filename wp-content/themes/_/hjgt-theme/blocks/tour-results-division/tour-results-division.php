<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "tournamentResultsArchive", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $raw_group = PG_Blocks_v2::getAttribute( $args, 'division' );
        
        $has_info = $raw_group.'_first_place';
        $division = preg_replace('/_/', ' ', $raw_group, 1);
        $division = preg_replace('/_/', ' & ', $division, 1);
        
        $divisionArray = array(
            'key' => $has_info,
            'value' => '',
            'compare' => '!='
            );
        
        $meta_query = array();
        $meta_query[] = $divisionArray;
        
        $result_division_query_args = array(
            'post_type' => 'result',
            'post_status' => 'publish',
            'order' => 'DESC',
            'orderby' => 'date'
        );
        
        if ($meta_query) {
            $result_division_query_args['meta_query'] = $meta_query;
        }
        
        
    ?> 
    <?php $result_division_query = new WP_Query( $result_division_query_args ); ?>
    <?php if ( $result_division_query->have_posts() ) : ?>
        <div class="tourResLoop"> 
            <?php $result_division_query_item_number = 0; ?>
            <?php while ( $result_division_query->have_posts() ) : $result_division_query->the_post(); ?>
                <?php if( $result_division_query_item_number >= 0 && $result_division_query_item_number <= 1 ) : ?>
                    <?php PG_Helper_v2::rememberShownPost(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'cardSimple mb-2 padLG' ); ?>> 
                        <?php
                            $event_start_date = get_field('event_start_date');
                            $event_end_date = get_field('event_end_date');
                            $event_image = get_field('event_image');
                            $event_id = get_field('event_id');
                            $golf_course_location = get_field('golf_course_location');
                            $event_recap = get_field('event_recap');
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
                            
                            if( have_rows($raw_group) ) {
                              the_row();
                                    $group = str_replace('-', '_', $raw_group);
                                    ${$group.'_first_place'} = get_sub_field('first_place');
                              if( ${$group.'_first_place'}) {
                                    ${$group.'event_summary'} = get_sub_field('event_summary');
                                    ${$group.'_first_place_points'} = get_sub_field('first_place_points');
                                    ${$group.'_first_place_headshot'} = get_sub_field('first_place_headshot');
                                    ${$group.'_second_place'} = get_sub_field('second_place');
                                    ${$group.'_second_place_points'} = get_sub_field('second_place_points');
                                    ${$group.'_second_place_headshot'} = get_sub_field('second_place_headshot');
                                    ${$group.'_third_place'} = get_sub_field('third_place');
                                    ${$group.'_third_place_points'} = get_sub_field('third_place_points');
                                    ${$group.'_third_place_headshot'} = get_sub_field('third_place_headshot');
                                    ${$group.'_fourth_place'} = get_sub_field('fourth_place');
                                    ${$group.'_fourth_place_points'} = get_sub_field('fourth_place_points');
                                    ${$group.'_fourth_place_headshot'} = get_sub_field('fourth_place_headshot');
                                    ${$group.'_fifth_place'} = get_sub_field('fifth_place');
                                    ${$group.'_fifth_place_points'} = get_sub_field('fifth_place_points');
                                    ${$group.'_fifth_place_headshot'} = get_sub_field('fifth_place_headshot');
                                    } else {
                                    $group = str_replace('-', '_', $group);
                                    the_row();
                                    unset(${$group.'event_summary'});
                                    unset(${$group.'_first_place'});
                                    unset(${$group.'_first_place_points'});
                                    unset(${$group.'_first_place_headshot'});
                                    unset(${$group.'_second_place'});
                                    unset(${$group.'_second_place_points'});
                                    unset(${$group.'_second_place_headshot'});
                                    unset(${$group.'_third_place'});
                                    unset(${$group.'_third_place_points'});
                                    unset(${$group.'_third_place_headshot'});
                                    unset(${$group.'_fourth_place'});
                                    unset(${$group.'_fourth_place_points'});
                                    unset(${$group.'_fourth_place_headshot'});
                                    unset(${$group.'_fifth_place'});
                                    unset(${$group.'_fifth_place_points'});
                                    unset(${$group.'_fifth_place_headshot'});
                                }
                                }
                        ?> 
                        <div class="row"> 
                            <div class="col"> 
                                <?php if ( $event_start_date ) : ?>
                                    <div class="date"> <span><?php echo $event_start_date ?></span> <span>-</span> <span><?php echo $event_end_date ?></span> 
                                    </div>
                                <?php endif; ?> 
                                <div class="head"> 
                                    <div class="h3 mb-0">
                                        <?php the_title(); ?>
                                    </div>                                     <a class="seeMore" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Learn More', 'tb_theme' ); ?></a> 
                                </div>                                 
                            </div>                             
                        </div>                         
                        <div class="row"> 
                            <div class="col-xl-6"> 
                                <?php if ( $event_image ) : ?>
                                    <div class="eventImg"> 
                                        <?php echo wp_get_attachment_image( $event_image, 'xl_large' ); ?> 
                                    </div>                                     
                                <?php elseif ( $exists ) : ?>
                                    <div class="eventImg"> 
                                        <img src="<?php echo 'https://cdn.shotstat.com/content/skin/hjgt/image/tournamentbanner/tnmtbanner'.$event_id.'.png'; ?>" alt="<?php echo $golf_course_location ?>"/> 
                                    </div>
                                <?php endif; ?> 
                                <div class="eventSummary">
                                    <?php echo ${$group.'event_summary'} ?>
                                </div>                                 
                            </div>                             
                            <div class="col-xl-6"> 
                                <div class="resultsTable"> 
                                    <div class="thead"> 
                                        <div class="th">
                                            <?php _e( 'Rank', 'tb_theme' ); ?>
                                        </div>                                         
                                        <div class="th">
                                            <?php _e( 'Player', 'tb_theme' ); ?>
                                        </div>                                         
                                        <div class="th">
                                            <?php _e( 'Total', 'tb_theme' ); ?>
                                        </div>                                         
                                        <div class="tborder"></div>                                         
                                    </div>                                     
                                    <div class="tbody"> 
                                        <?php if ( ${$group.'_first_place'} ) : ?>
                                            <div class="td"> <span><?php _e( 'No. 1', 'tb_theme' ); ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_first_place'} ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( ${$group.'_first_place_headshot'} ) : ?>
                                                            <?php echo wp_get_attachment_image( ${$group.'_first_place_headshot'}, '
                                                            thumbnail' ); ?> 
                                                        <?php elseif ( str_contains($group, 'boy') ) : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Boys Bio Image"/> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo ${$group.'_first_place'}; ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_first_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_first_place_points'} > 0) {
                                                            echo "+".${$group.'_first_place_points'};
                                                        } elseif (${$group.'_first_place_points'} < 0) {
                                                            echo ${$group.'_first_place_points'};
                                                        } elseif (${$group.'_first_place_points'} == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Points', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_second_place'} ) : ?>
                                            <div class="td"> <span><?php _e( 'No. 2', 'tb_theme' ); ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_second_place'} ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( ${$group.'_second_place_headshot'} ) : ?>
                                                            <?php echo wp_get_attachment_image( ${$group.'_second_place_headshot'}, '
                                                            thumbnail' ); ?> 
                                                        <?php elseif ( str_contains($group, 'boy') ) : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Boys Bio Image"/> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo ${$group.'_second_place'} ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_second_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_second_place_points'} > 0) {
                                                            echo "+".${$group.'_second_place_points'};
                                                        } elseif (${$group.'_second_place_points'} < 0) {
                                                            echo ${$group.'_second_place_points'};
                                                        } elseif (${$group.'_second_place_points'} == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Points', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_third_place'} ) : ?>
                                            <div class="td"> <span><?php _e( 'No. 3', 'tb_theme' ); ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_third_place'} ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( ${$group.'_third_place_headshot'} ) : ?>
                                                            <?php echo wp_get_attachment_image( ${$group.'_third_place_headshot'}, '
                                                            thumbnail' ); ?> 
                                                        <?php elseif ( str_contains($group, 'boy') ) : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Boys Bio Image"/> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo ${$group.'_third_place'} ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_third_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_third_place_points'} > 0) {
                                                            echo "+".${$group.'_third_place_points'};
                                                        } elseif (${$group.'_third_place_points'} < 0 ) {
                                                            echo ${$group.'_third_place_points'};
                                                        } elseif (${$group.'_third_place_points'} == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Points', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fourth_place'} ) : ?>
                                            <div class="td"> <span><?php _e( 'No. 4', 'tb_theme' ); ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fourth_place'} ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( ${$group.'_fourth_place_headshot'} ) : ?>
                                                            <?php echo wp_get_attachment_image( ${$group.'_fourth_place_headshot'}, '
                                                            thumbnail' ); ?> 
                                                        <?php elseif ( str_contains($group, 'boy') ) : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Boys Bio Image"/> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo ${$group.'_fourth_place'} ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fourth_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_fourth_place_points'} > 0) {
                                                            echo "+".${$group.'_fourth_place_points'} ;
                                                        } elseif (${$group.'_fourth_place_points'} < 0) {
                                                            echo ${$group.'_fourth_place_points'};
                                                        } elseif (${$group.'_fourth_place_points'} == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Points', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fifth_place'} ) : ?>
                                            <div class="td"> <span><?php _e( 'No. 5', 'tb_theme' ); ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fifth_place'} ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( ${$group.'_fifth_place_headshot'} ) : ?>
                                                            <?php echo wp_get_attachment_image( ${$group.'_fifth_place_headshot'}, '
                                                            thumbnail' ); ?> 
                                                        <?php elseif ( str_contains($group, 'boy') ) : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Boys Bio Image"/> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo ${$group.'_fifth_place'} ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fifth_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_fifth_place_points'} > 0) {
                                                            echo "+".${$group.'_fifth_place_points'};
                                                        } elseif (${$group.'_fifth_place_points'} < 0) {
                                                            echo ${$group.'_fifth_place_points'};
                                                        } elseif (${$group.'_fifth_place_points'} == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Points', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                    </div>                                     
                                </div>                                 
                            </div>                             
                        </div>                         
                    </div>
                <?php endif; ?>
                <?php $result_division_query_item_number++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
    <div class="d-flex jr_guten_btn_wrap justify-content-center mt-2"> <a class="btn btn-outline-secondary tColorBlack text-capitalize" href="<?php echo esc_url( get_site_url().'/result/?division='.$raw_group ); ?>"><?php _e( 'See All', 'tb_theme' ); ?> <?php echo $division; ?> <?php _e( 'Results', 'tb_theme' ); ?></a> 
    </div>     
</div>