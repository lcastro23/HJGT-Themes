<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array() ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $testimonial_archive_args = array(
            'post_type' => 'testimonial',
            'post_status' => 'publish',
            'nopaging' => true,
            'order' => 'DESC',
            'orderby' => 'date',
            'meta_key' => 'video_or_text',
            'meta_value' => 'text'
        )
    ?>
    <?php $testimonial_archive = new WP_Query( $testimonial_archive_args ); ?>
    <?php if ( $testimonial_archive->have_posts() ) : ?>
        <div class="testimonialArchive"> 
            <?php while ( $testimonial_archive->have_posts() ) : $testimonial_archive->the_post(); ?>
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
</div>