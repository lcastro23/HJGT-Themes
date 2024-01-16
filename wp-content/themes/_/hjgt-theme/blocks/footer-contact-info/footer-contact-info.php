<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "contact_info no-gutters row", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <div class="col-lg-12 col-md-6 contact_left"> 
        <div class="font-weight-bold mb-quarter">
            <?php _e( 'Send Us A Message', 'tb_theme' ); ?>
        </div>         
        <div class="email_wrapper"> 
            <div class="email"> <a href="<?php echo get_theme_mod( 'contact_info_email_mail_to_link', 'filler' ); ?>"><?php echo get_theme_mod( 'contact_info_email', __( 'email@willpullfromcustomizer.com', 'tb_theme' ) ); ?></a> 
            </div>             
        </div>         
        <div class="font-weight-bold mb-quarter">
            <?php _e( 'HJGT Headquarters', 'tb_theme' ); ?>
        </div>         
        <div class="address"> <a class="address_wrapper" href="<?php echo get_theme_mod( 'contact_info_g-map', 'filler' ); ?>"> <div class="address1">
                    <?php echo get_theme_mod( 'contact_info_address1', __( 'Address 1 Will Auto Populate', 'tb_theme' ) ); ?>
                </div> <div class="address2">
                    <?php echo get_theme_mod( 'contact_info_address2', __( 'Addresss 2 Filler Text', 'tb_theme' ) ); ?>
                </div> <div class="address3"> <span class=""><span><?php echo get_theme_mod( 'contact_info_city', __( 'City Filler', 'tb_theme' ) ); ?></span><span>, </span></span> <span><?php echo get_theme_mod( 'contact_info_state', __( 'State Filler', 'tb_theme' ) ); ?></span> <span><?php echo get_theme_mod( 'contact_info_zipcode', __( 'Zip Filler', 'tb_theme' ) ); ?></span> 
                </div> </a> 
        </div>         
    </div>     
    <div class="col-lg-12 col-md-6 contact_right"> 
        <div class="font-weight-bold mb-quarter">
            <?php _e( 'Call/Text Us Today', 'tb_theme' ); ?>
        </div>         
        <div class="phone_wrapper"> 
            <div class="phone"> <a href="<?php echo get_theme_mod( 'contact_info_phone_link', 'filler' ); ?>"><?php echo get_theme_mod( 'contact_info_phone', '(555) 555-5555' ); ?></a> 
            </div>             
        </div>         
    </div>     
</div>