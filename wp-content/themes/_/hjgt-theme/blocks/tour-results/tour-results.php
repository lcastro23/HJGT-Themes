<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "tournamentResultsArchive", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;   
        $per_page = 4;   
        $default_offset = 0;    
        if ($paged == 1) {$offset = $default_offset; } 
    else {$offset = (($paged - 1) * $per_page) + $default_offset;  } ?> 
    <?php
        $queryState = $_GET['state'];
        $queryYear = $_GET['tyear'];
        $queryDivision = $_GET['division'];
        $betweenYears = [];
        $betweenYears[] .= $queryYear.'-01-01,';
        $betweenYears[] .= $queryYear.'-12-31';
        
        $has_info = $queryDivision.'_first_place';
        
        $stateArray = array(
            'key' => 'state_location',
            'value' => $queryState,
            'compare' => '='
            );
        
        $yearArray = array(
            'key' => 'event_end_date',
            'value' => $betweenYears,
            'type' =>  'date',
            'compare' => 'between'
            );
        
        
        $divisionArray = array(
            'key' => $has_info,
            'value' => '',
            'compare' => '!='
            );    
        
        $meta_query = array();
        
        
        if ($queryState && $queryState != 'all') {
            $meta_query[] = $stateArray;
        }
        
        if ($queryYear && $queryYear != 'all') {
            $meta_query[] = $yearArray;
        }
        
        if ($queryDivision && $queryDivision != 'all') {
            $meta_query[] = $divisionArray;
        }
        
        if ( count($meta_query) > 1) {
            $meta_query['relation'] = 'AND';
        }
    ?> 
    <?php
        $queryState = $_GET['state'];
        $queryYear = $_GET['tyear'];
        $queryDivision = $_GET['division'];
        $betweenYears = [];
        $betweenYears[] .= $queryYear.'-01-01,';
        $betweenYears[] .= $queryYear.'-12-31';
        
        $has_info = $queryDivision.'_first_place';
        
        $stateArray = array(
            'key' => 'state_location',
            'value' => $queryState,
            'compare' => '='
            );
        
        $yearArray = array(
            'key' => 'event_end_date',
            'value' => $betweenYears,
            'type' =>  'date',
            'compare' => 'between'
            );
        
        
        $divisionArray = array(
            'key' => $has_info,
            'value' => '',
            'compare' => '!='
            );    
        
        $meta_query = array();
        
        
        if ($queryState && $queryState != 'all') {
            $meta_query[] = $stateArray;
        }
        
        if ($queryYear && $queryYear != 'all') {
            $meta_query[] = $yearArray;
        }
        
        if ($queryDivision && $queryDivision != 'all') {
            $meta_query[] = $divisionArray;
        }
        
        if ( count($meta_query) > 1) {
            $meta_query['relation'] = 'AND';
        }
        
        $result_query_args = array(
            'post_type' => 'result',
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'paged' => $paged,
            'order' => 'DESC',
            'orderby' => 'date'
        );
        
        if ($meta_query) {
            $result_query_args['meta_query'] = $meta_query;
        }
    ?> 
    <?php
        if ($meta_query) {
            $result_query_args['meta_query'] = $meta_query;
        }
    ?> 
    <?php $result_query = new WP_Query( $result_query_args ); ?>
    <?php if ( $result_query->have_posts() ) : ?>
        <div class="tourResLoop"> 
            <?php while ( $result_query->have_posts() ) : $result_query->the_post(); ?>
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
                                </div>                                 <a class="seeMore" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Learn More', 'tb_theme' ); ?></a> 
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
                            <?php if ( $queryDivision && $queryDivision != 'all' ) : ?>
                                <div class="eventSummary">
                                    <?php echo ${$group.'event_summary'} ?>
                                </div>                                 
                            <?php else : ?>
                                <div class="eventSummary">
                                    <?php echo $event_recap ?>
                                </div>
                            <?php endif; ?> 
                        </div>                         
                        <div class="col-xl-6"> 
                            <?php if ( $queryDivision && $queryDivision != 'all' ) : ?>
                                <div class="resultsTable"> 
                                    <?php
                                        $raw_group = $queryDivision;
                                        $group = str_replace('-', '_', $raw_group);
                                        
                                        $event_recap = get_field('event_recap');
                                        
                                        if( have_rows($raw_group) ) {
                                          the_row();
                                                $group = str_replace('-', '_', $raw_group);
                                                ${$group.'_first_place'} = get_sub_field('first_place');
                                          if( ${$group.'_first_place'}) {
                                                ${$group.'event_summary'} = get_sub_field('event_summary');
                                                ${$group.'_first_place_title'} = get_sub_field('first_place_title');
                                                ${$group.'_first_place_points'} = get_sub_field('first_place_points');
                                                ${$group.'_first_place_headshot'} = get_sub_field('first_place_headshot');
                                                ${$group.'_second_place'} = get_sub_field('second_place');
                                                ${$group.'_second_place_title'} = get_sub_field('second_place_title');
                                                ${$group.'_second_place_points'} = get_sub_field('second_place_points');
                                                ${$group.'_second_place_headshot'} = get_sub_field('second_place_headshot');
                                                ${$group.'_third_place'} = get_sub_field('third_place');
                                                ${$group.'_third_place_title'} = get_sub_field('third_place_title');
                                                ${$group.'_third_place_points'} = get_sub_field('third_place_points');
                                                ${$group.'_third_place_headshot'} = get_sub_field('third_place_headshot');
                                                ${$group.'_fourth_place'} = get_sub_field('fourth_place');
                                                ${$group.'_fourth_place_title'} = get_sub_field('fourth_place_title');
                                                ${$group.'_fourth_place_points'} = get_sub_field('fourth_place_points');
                                                ${$group.'_fourth_place_headshot'} = get_sub_field('fourth_place_headshot');
                                                ${$group.'_fifth_place'} = get_sub_field('fifth_place');
                                                ${$group.'_fifth_place_title'} = get_sub_field('fifth_place_title');
                                                ${$group.'_fifth_place_points'} = get_sub_field('fifth_place_points');
                                                ${$group.'_fifth_place_headshot'} = get_sub_field('fifth_place_headshot');
                                                } else {
                                                $group = str_replace('-', '_', $group);
                                                the_row();
                                                unset(${$group.'event_summary'});
                                                unset(${$group.'_first_place'});
                                                unset(${$group.'_first_place_title'});
                                                unset(${$group.'_first_place_points'});
                                                unset(${$group.'_first_place_headshot'});
                                                unset(${$group.'_second_place'});
                                                unset(${$group.'_second_place_title'});
                                                unset(${$group.'_second_place_points'});
                                                unset(${$group.'_second_place_headshot'});
                                                unset(${$group.'_third_place'});
                                                unset(${$group.'_third_place_title'});
                                                unset(${$group.'_third_place_points'});
                                                unset(${$group.'_third_place_headshot'});
                                                unset(${$group.'_fourth_place'});
                                                unset(${$group.'_fourth_place_title'});
                                                unset(${$group.'_fourth_place_points'});
                                                unset(${$group.'_fourth_place_headshot'});
                                                unset(${$group.'_fifth_place'});
                                                unset(${$group.'_fifth_place_title'});
                                                unset(${$group.'_fifth_place_points'});
                                                unset(${$group.'_fifth_place_headshot'});
                                            }
                                        }
                                        
                                    ?> 
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
                                            <div class="td"> <span><?php if (${$group.'_first_place_title'}){
                                                        echo ${$group.'_first_place_title'};
                                                        } else {
                                                        echo "No. 1" ;
                                                    } ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
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
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_second_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_second_place_title'}){
                                                        echo ${$group.'_second_place_title'};
                                                        } else {
                                                        echo "No. 2" ;
                                                    } ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
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
                                                        }
                                                    ${$group.'_second_place_points'} ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_third_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_third_place_title'}){
                                                        echo ${$group.'_third_place_title'};
                                                        } else {
                                                        echo "No. 3" ;
                                                    } ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
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
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fourth_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_fourth_place_title'}){
                                                        echo ${$group.'_fourth_place_title'};
                                                        } else {
                                                        echo "No. 4" ;
                                                    } ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
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
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( ${$group.'_fifth_place'} ) : ?>
                                            <div class="td"> <span><?php if (${$group.'_fifth_place_title'} ) {
                                                        echo $ { $group.'_fifth_place_title' };
                                                        } else {
                                                        echo "No. 5" ;
                                                    } ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
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
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                    </div>                                     
                                </div>                                 
                            <?php else : ?>
                                <div class="resultsTable"> 
                                    <?php
                                        $age_groups = ['boys_16-18','boys_14-15','boys_11-13','boys_10_under','girls_14-18','girls_13_under'];
                                        foreach ($age_groups as $group) {
                                          if( have_rows($group) ) {
                                            while( have_rows($group) ) {
                                                $group = str_replace('-', '_', $group);
                                                the_row();
                                                ${$group.'_first_place'} = get_sub_field('first_place');
                                                ${$group.'_first_place_points'} = get_sub_field('first_place_points');
                                                ${$group.'_first_place_headshot'} = get_sub_field('first_place_headshot');
                                            }
                                          } else {
                                            $group = str_replace('-', '_', $group);
                                            the_row();
                                            unset(${$group.'_first_place'});
                                            unset(${$group.'_first_place_points'});
                                            unset(${$group.'_first_place_headshot'});
                                          }
                                        }
                                        
                                    ?> 
                                    <div class="thead"> 
                                        <div class="th">
                                            <?php _e( 'Division', 'tb_theme' ); ?>
                                        </div>                                         
                                        <div class="th">
                                            <?php _e( 'Leader', 'tb_theme' ); ?>
                                        </div>                                         
                                        <div class="th">
                                            <?php _e( 'Total', 'tb_theme' ); ?>
                                        </div>                                         
                                        <div class="tborder"></div>                                         
                                    </div>                                     
                                    <div class="tbody"> 
                                        <?php if ( $boys_16_18_first_place ) : ?>
                                            <div class="td"> <span><?php _e( 'Boys 16-18', 'tb_theme' ); ?></span> <span><?php _e( 'Division', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_16_18_first_place ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( $boys_16_18_first_place_headshot ) : ?>
                                                            <?php echo wp_get_attachment_image( $boys_16_18_first_place_headshot, '
                                                            thumbnail' ); ?> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo $boys_16_18_first_place ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_16_18_first_place ) : ?>
                                            <div class="td"> <span><?php if ($boys_16_18_first_place_points > 0) {
                                                            echo "+".$boys_16_18_first_place_points;
                                                        } elseif ($boys_16_18_first_place_points < 0) {
                                                            echo $boys_16_18_first_place_points;
                                                        } elseif ($boys_16_18_first_place_points == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                        }
                                                     ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_14_15_first_place ) : ?>
                                            <div class="td"> <span><?php _e( 'Boys 14-15', 'tb_theme' ); ?></span> <span><?php _e( 'Division', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_14_15_first_place ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( $boys_14_15_first_place_headshot ) : ?>
                                                            <?php echo wp_get_attachment_image( $boys_14_15_first_place_headshot, '
                                                            thumbnail' ); ?> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo $boys_14_15_first_place ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_14_15_first_place ) : ?>
                                            <div class="td"> <span><?php if ($boys_14_15_first_place_points > 0) {
                                                            echo "+".$boys_14_15_first_place_points;
                                                        } elseif ($boys_14_15_first_place_points < 0) {
                                                            echo $boys_14_15_first_place_points;
                                                        } elseif ($boys_14_15_first_place_points == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_11_13_first_place ) : ?>
                                            <div class="td"> <span><?php _e( 'Boys 11-13', 'tb_theme' ); ?></span> <span><?php _e( 'Division', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_11_13_first_place ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( $boys_11_13_first_place_headshot ) : ?>
                                                            <?php echo wp_get_attachment_image( $boys_11_13_first_place_headshot, '
                                                            thumbnail' ); ?> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo $boys_11_13_first_place ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_11_13_first_place ) : ?>
                                            <div class="td"> <span><?php if ($boys_11_13_first_place_points > 0) {
                                                            echo "+".$boys_11_13_first_place_points;
                                                        } elseif ($boys_11_13_first_place_points < 0 ) {
                                                            echo $boys_11_13_first_place_points;
                                                        } elseif ($boys_11_13_first_place_points == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_10_under_first_place ) : ?>
                                            <div class="td"> <span><?php _e( 'Boys 10&amp;U', 'tb_theme' ); ?></span> <span><?php _e( 'Division', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_10_under_first_place ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( $boys_10_under_first_place_headshot ) : ?>
                                                            <?php echo wp_get_attachment_image( $boys_10_under_first_place_headshot, '
                                                            thumbnail' ); ?> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo $boys_10_under_first_place ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $boys_10_under_first_place ) : ?>
                                            <div class="td"> <span><?php if ($boys_10_under_first_place_points > 0) {
                                                            echo "+".$boys_10_under_first_place_points;
                                                        } elseif ($boys_10_under_first_place_points < 0) {
                                                            echo $boys_10_under_first_place_points;
                                                        } elseif ($boys_10_under_first_place_points == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $girls_14_18_first_place ) : ?>
                                            <div class="td"> <span><?php _e( 'Girls 14-18', 'tb_theme' ); ?></span> <span><?php _e( 'Division', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $girls_14_18_first_place ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( $girls_14_18_first_place_headshot ) : ?>
                                                            <?php echo wp_get_attachment_image( $girls_14_18_first_place_headshot, '
                                                            thumbnail' ); ?> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo $girls_14_18_first_place ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $girls_14_18_first_place ) : ?>
                                            <div class="td"> <span><?php if ($girls_14_18_first_place_points > 0) {
                                                            echo "+".$girls_14_18_first_place_points;
                                                        } elseif ($girls_14_18_first_place_points < 0) {
                                                            echo $girls_14_18_first_place_points;
                                                        } elseif ($girls_14_18_first_place_points == '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $girls_13_under_first_place ) : ?>
                                            <div class="td"> <span><?php _e( 'Girls 13&amp;U', 'tb_theme' ); ?></span> <span><?php _e( 'Division', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $girls_13_under_first_place ) : ?>
                                            <div class="td"> 
                                                <div class="playerInfo"> 
                                                    <div class="bioHeadshot"> 
                                                        <?php if ( $girls_13_under_first_place_headshot ) : ?>
                                                            <?php echo wp_get_attachment_image( $girls_13_under_first_place_headshot, '
                                                            thumbnail' ); ?> 
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                                        <?php endif; ?> 
                                                    </div>                                                     
                                                    <div class="bioMeta"> 
                                                        <div class="name">
                                                            <?php echo $girls_13_under_first_place ?>
                                                        </div>                                                         
                                                    </div>                                                     
                                                </div>                                                 
                                            </div>
                                        <?php endif; ?> 
                                        <?php if ( $girls_13_under_first_place ) : ?>
                                            <div class="td"> <span><?php if ($girls_13_under_first_place_points > 0) {
                                                            echo "+".$girls_13_under_first_place_points;
                                                        } elseif ($girls_13_under_first_place_points < 0) {
                                                            echo $girls_13_under_first_place_points;
                                                        } elseif ($girls_13_under_first_place_points== '0') {
                                                            echo "E";
                                                        } else {
                                                            echo "- -";
                                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
                                            </div>
                                        <?php endif; ?> 
                                    </div>                                     
                                </div>
                            <?php endif; ?> 
                        </div>                         
                    </div>                     
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?> 
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
    <div class="paginationWP">
        <?php $big = 9999999999;
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?page=%#%',
                'current' => $paged,
                'total' => $result_query->max_num_pages,
                'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
            </svg>',
                'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501" fill="currentColor"> 
                <path data-name="Icon ionic-ios-arrow-round-forward" d="M20.784,11.51a.919.919,0,0,0-.007,1.294l4.275,4.282H8.782a.914.914,0,0,0,0,1.828H25.045L20.77,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.026,1.026,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.784,11.51Z" transform="translate(-7.875 -11.252)"/> 
            </svg>'
          ) ); ?>
    </div>     
</div>