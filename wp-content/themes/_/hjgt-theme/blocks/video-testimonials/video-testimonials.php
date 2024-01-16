<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('id' => "tesimonials-video-slider", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $testimonial_slider_args = array(
            'post_type' => 'testimonial',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'date',
            'meta_key' => 'video_or_text',
            'meta_value' => 'video'
        )
    ?>
    <?php $testimonial_slider = new WP_Query( $testimonial_slider_args ); ?>
    <?php if ( $testimonial_slider->have_posts() ) : ?>
        <div class="equaBoxSlider videoTestimonial"> 
            <?php while ( $testimonial_slider->have_posts() ) : $testimonial_slider->the_post(); ?>
                <?php PG_Helper_v2::rememberShownPost(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'equaBox' ); ?>> 
                    <div class="videoWrapper"> 
                        <?php echo get_field( 'youtube_url' ); ?> 
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