<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "container tournResultsSingle", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $event_start_date = get_field('event_start_date');
        $event_end_date = get_field('event_end_date');
        $event_image = get_field('event_image');
        $event_id = get_field('event_id');
        $golf_course_location = get_field('golf_course_location');
        $event_recap = get_field('event_recap');
        $state_location = get_field('state_location');
        $city_location = get_field('city_location');
    ?> 
    <div class="eventDetails"> 
        <h1 class="mb-0"><?php the_title(); ?></h1> 
        <div class="meta"> 
            <?php if ( $event_start_date ) : ?>
                <div class="date"> <span><?php echo $event_start_date ?></span> <span>-</span> <span><?php echo $event_end_date ?></span> 
                </div>
            <?php endif; ?> 
            <?php if ( $golf_course_location ) : ?>
                <div>•</div>
            <?php endif; ?> 
            <?php if ( $golf_course_location ) : ?>
                <div class="course">
                    <?php echo $golf_course_location; ?>
                </div>
            <?php endif; ?> 
            <?php if ( $state_location ) : ?>
                <div>•</div>
            <?php endif; ?> 
            <?php if ( $state_location ) : ?>
                <div class="courseLocation"> 
                    <?php if ( $city_location ) : ?>
                        <span><?php echo $city_location.', '; ?></span>
                    <?php endif; ?> <span><?php echo $state_location; ?></span> 
                </div>
            <?php endif; ?> 
        </div>         
        <?php if ( $event_image ) : ?>
            <div class="eventImg"> 
                <?php echo wp_get_attachment_image( $event_image, 'xl_large' ); ?> 
            </div>             
        <?php elseif ( $event_id ) : ?>
            <div class="eventImg"> 
                <img src="<?php echo 'https://cdn.shotstat.com/content/skin/hjgt/image/tournamentbanner/tnmtbanner'.$event_id.'.png'; ?>" alt="<?php echo $golf_course_location ?>"/> 
            </div>
        <?php endif; ?> 
        <div class="eventSummary">
            <?php echo $event_recap ?>
        </div>         
    </div>     
    <?php
        $age_groups = ['boys_16-18','boys_14-15','boys_11-13','boys_10_under','girls_14-18','girls_13_under'];
        foreach ($age_groups as $group) :
          if( have_rows($group) ) :
          the_row();
          $division = preg_replace('/_/', ' ', $group, 1);
                $division = preg_replace('/_/', ' & ', $division, 1);
                $group = str_replace('-', '_', $group);
                ${$group.'_first_place'} = get_sub_field('first_place');
          if( ${$group.'_first_place'}) :
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
    ?> 
    <div class="cardSimple mb-2 padLG"> 
        <div class="row"> 
            <div class="col"> 
                <div class="head"> 
                    <div class="h3 mb-0">
                        <?php echo $division ?>
                    </div>                     
                    <?php if ( $event_id ) : ?>
                        <a class="seeMore" href="<?php echo esc_url( 'https://tournaments.hjgt.org/Scoreboard?TournamentID='.$event_id ); ?>" target="_blank"><?php _e( 'See Full Details', 'tb_theme' ); ?></a>
                    <?php endif; ?> 
                </div>                 
                <?php if ( ${$group.'event_summary'} ) : ?>
                    <div class="divisionSummary">
                        <?php echo ${$group.'event_summary'} ?>
                    </div>
                <?php endif; ?> 
            </div>             
        </div>         
        <div class="row"> 
            <div class="col-lg-4"> 
                <?php if ( ${$group.'_first_place_headshot'} ) : ?>
                    <div class="eventImg"> 
                        <?php echo wp_get_attachment_image( ${$group.'_first_place_headshot'}, 'medium_large' ); ?> 
                    </div>                     
                <?php else : ?>
                    <div class="eventImg"> 
                        <?php if ( str_contains($division, 'boy') ) : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Placeholder.jpg" alt="Boys Bio Image"/> 
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Placeholder.jpg" alt="Girls Bio Image"/>
                        <?php endif; ?> 
                    </div>
                <?php endif; ?> 
            </div>             
            <div class="col-lg-8"> 
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
                                        <?php elseif ( str_contains($division, 'boy') ) : ?>
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
                                        <?php elseif ( str_contains($division, 'boy') ) : ?>
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
                                    } ?></span> <span><?php _e( 'Total', 'tb_theme' ); ?></span> 
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
                                        <?php elseif ( str_contains($division, 'boy') ) : ?>
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
                                        <?php elseif ( str_contains($division, 'boy') ) : ?>
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
                            <div class="td"> <span><?php if (${$group.'_fifth_place_title'}){
                                        echo ${$group.'_fifth_place_title'};
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
                                        <?php elseif ( str_contains($division, 'boy') ) : ?>
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
            </div>             
        </div>         
    </div>     
    <?php
        endif;
        endif;
        endforeach;
    ?> 
</div>