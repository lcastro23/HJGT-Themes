<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('id' => "tesimonials-slider", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $testimonial_args = array(
            'post_type' => 'testimonial',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'date',
            'meta_key' => 'video_or_text',
            'meta_value' => 'text'
        )
    ?>
    <?php $testimonial = new WP_Query( $testimonial_args ); ?>
    <?php if ( $testimonial->have_posts() ) : ?>
        <div class="equaBoxSlider"> 
            <?php while ( $testimonial->have_posts() ) : $testimonial->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'equaBox' ); ?>> 
                    <div> 
                        <div class="quote"> 
                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/quoteIcon.svg" alt="Quote Icon" width="35" height="25"/> 
                        </div>                         
                        <div class="testimonial"> <span>&quot;</span> <span><?php echo get_field( 'testimonial_content' ); ?></span> <span>&quot;</span> 
                        </div>                         
                        <div class="bioInfo"> 
                            <div class="bioImage"> 
                                <?php $image = get_field('player_bio_image'); ?> 
                                <?php if ( $image ) : ?>
                                    <img src="<?php $size = 'medium'; 
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
} ?>" alt="HJGT Logo Icon" width="55" height="55"/> 
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/a_images/hjgt-logo-icon.svg" alt="HJGT Logo Icon" width="55" height="55"/>
                                <?php endif; ?> 
                            </div>                             
                            <div class="bioDesc"> 
                                <div class="name">
                                    <?php the_title(); ?>
                                </div>                                 
                                <div class="class"> <span><?php _e( 'Class of&nbsp;', 'tb_theme' ); ?></span> <span><?php echo get_field( 'class_year' ); ?></span> 
                                </div>                                 
                            </div>                             
                        </div>                         
                    </div>                     
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>                                                     
        </div>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'tb_theme' ); ?></p>
    <?php endif; ?> 
    <div class="slideButtons"> 
        <div class="slideBtns slidePrev"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="32.373" height="21.59" viewBox="0 0 32.373 21.59" fill="currentColor"> 
                <path d="M28.52,11.665a1.469,1.469,0,0,0-.011,2.069l6.837,6.847H9.326a1.462,1.462,0,0,0,0,2.923H35.334L28.5,30.352a1.48,1.48,0,0,0,.011,2.069,1.456,1.456,0,0,0,2.058-.011l9.265-9.332h0a1.642,1.642,0,0,0,.3-.461,1.4,1.4,0,0,0,.112-.562,1.465,1.465,0,0,0-.416-1.023L30.566,11.7A1.432,1.432,0,0,0,28.52,11.665Z" transform="translate(-7.875 -11.252)"/> 
            </svg>             
        </div>         
        <div class="slideBtns slideNext"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="32.373" height="21.59" viewBox="0 0 32.373 21.59" fill="currentColor"> 
                <path d="M28.52,11.665a1.469,1.469,0,0,0-.011,2.069l6.837,6.847H9.326a1.462,1.462,0,0,0,0,2.923H35.334L28.5,30.352a1.48,1.48,0,0,0,.011,2.069,1.456,1.456,0,0,0,2.058-.011l9.265-9.332h0a1.642,1.642,0,0,0,.3-.461,1.4,1.4,0,0,0,.112-.562,1.465,1.465,0,0,0-.416-1.023L30.566,11.7A1.432,1.432,0,0,0,28.52,11.665Z" transform="translate(-7.875 -11.252)"/> 
            </svg>             
        </div>         
    </div>     
</div>