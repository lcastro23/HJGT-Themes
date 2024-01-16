<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "header-wrapper site-header", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <div id="jr-header-sticky"> 
        <div id="header_wrapper-1"> <a class="skip-link sr-only sr-only-focusable" href="#main-content"><?php _e( 'Skip to content', 'tb_theme' ); ?></a> 
            <div id="mobile_jr_menu-1"> 
                <div id="mobile_jr_inner" class="inner_jr_mobile"> 
                    <div class="mobile_click" id="mobile_upper_content"> 
                        <div id="topper"> 
                            <div>
                                <?php _e( 'Menu', 'tb_theme' ); ?>
                            </div>                             
                            <div id="mobile_m_close"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.508" height="15.504" viewBox="0 0 15.508 15.504"> 
                                    <path d="M20.877,19.041,26.416,13.5a1.3,1.3,0,0,0-1.835-1.835l-5.539,5.539L13.5,11.666A1.3,1.3,0,1,0,11.667,13.5l5.539,5.539L11.667,24.58A1.3,1.3,0,1,0,13.5,26.415l5.539-5.539,5.539,5.539a1.3,1.3,0,1,0,1.835-1.835Z" transform="translate(-11.285 -11.289)"/> 
                                </svg>                                 
                            </div>                             
                        </div>                                                  
                    </div>                     
                    <div class="mobile_click" id="wrapper_mm_1"> 
                        <?php wp_nav_menu( array(
                                'menu' => 'mobile_menu_locations',
                                'menu_class' => 'mobile_click',
                                'menu_id' => 'ul_mm_1',
                                'container' => '',
                                'theme_location' => 'mobile',
                                'walker' => new Mobile_Locations_Walker()
                        ) ); ?> 
                    </div>                     
                    <div class="p-1"> 
                        <div class="d-flex jr_guten_btn_wrap justify-content-start mb-1"> <a class="btn btn-secondary flex-grow-1 jr_guten_btn justify-content-center text-white" href="<?php echo get_theme_mod( 'contact_info_schedule', 'filler' ); ?>" target="_self" rel="noopener"><?php _e( 'View Schedule', 'tb_theme' ); ?></a> 
                        </div>                         
                        <div class="d-flex jr_guten_btn_wrap justify-content-start"> <a class="btn btn-outline-secondary flex-grow-1 jr_guten_btn justify-content-center" href="<?php echo get_theme_mod( 'contact_info_login', 'filler' ); ?>" target="_self" rel="noopener"><?php _e( 'Login', 'tb_theme' ); ?></a> 
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
            <div id="menu_items"> 
                <div class="motion_wrapper"> <a class="inner" href="<?php echo get_theme_mod( 'contact_info_schedule', 'filler' ); ?>"> <div class="img-wrapper"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.029" height="23.103" viewBox="0 0 25.029 23.103" fill="currentColor"> 
                                <path d="M26,6.75H23.591V8.194a.483.483,0,0,1-.481.481h-.963a.483.483,0,0,1-.481-.481V6.75H10.114V8.194a.483.483,0,0,1-.481.481H8.67a.483.483,0,0,1-.481-.481V6.75H5.782A2.414,2.414,0,0,0,3.375,9.157V25.522a2.414,2.414,0,0,0,2.407,2.407H26A2.414,2.414,0,0,0,28.4,25.522V9.157A2.414,2.414,0,0,0,26,6.75Zm.481,18.05a1.207,1.207,0,0,1-1.2,1.2H6.5a1.207,1.207,0,0,1-1.2-1.2V13.97a.483.483,0,0,1,.481-.481H26a.483.483,0,0,1,.481.481Z" transform="translate(-3.375 -4.825)"/> 
                                <path d="M10.925,4.981a.483.483,0,0,0-.481-.481H9.481A.483.483,0,0,0,9,4.981V6.425h1.925Z" transform="translate(-4.187 -4.5)"/> 
                                <path d="M26.675,4.981a.483.483,0,0,0-.481-.481h-.963a.483.483,0,0,0-.481.481V6.425h1.925Z" transform="translate(-6.46 -4.5)"/> 
                            </svg>                             
                        </div> <div>
                            <?php _e( 'Schedule', 'tb_theme' ); ?>
                        </div></a> <a class="inner" href="<?php echo get_theme_mod( 'contact_info_membership', 'filler' ); ?>"> <div class="img-wrapper"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.029" height="23.104" viewBox="0 0 25.029 23.104" fill="currentColor"> 
                                <path d="M14.193,19.523a.781.781,0,0,1,0-1.107l8.044-8.044a2.378,2.378,0,0,0-1.053-.247H5.782a2.414,2.414,0,0,0-2.407,2.407V26.009a2.414,2.414,0,0,0,2.407,2.407h15.4a2.414,2.414,0,0,0,2.407-2.407V12.532a2.378,2.378,0,0,0-.247-1.053L15.3,19.523A.781.781,0,0,1,14.193,19.523Z" transform="translate(-3.375 -5.312)"/> 
                                <path d="M31.085,4.771a.938.938,0,0,0-.632-.271H24.617a.782.782,0,0,0-.012,1.564l4.049.03L25.189,9.56A2.407,2.407,0,0,1,26.3,10.667L29.761,7.2l.03,4.049a.782.782,0,0,0,1.564-.012v-5.9A.855.855,0,0,0,31.085,4.771Z" transform="translate(-6.327 -4.5)"/> 
                            </svg>                             
                        </div> <div>
                            <?php _e( 'Join HJGT', 'tb_theme' ); ?>
                        </div></a> <a class="inner" href="<?php echo get_theme_mod( 'contact_info_login', 'filler' ); ?>"> <div class="img-wrapper"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.102" height="23.103" viewBox="0 0 23.102 23.103" fill="currentColor"> 
                                <path d="M27.592,27.02c-.433-1.913-2.906-2.846-3.76-3.147a28.035,28.035,0,0,0-3.135-.6,3.185,3.185,0,0,1-1.45-.668,12.672,12.672,0,0,1-.1-2.966,8.924,8.924,0,0,0,.686-1.306,16.84,16.84,0,0,0,.505-2.28s.493,0,.668-.866a8.524,8.524,0,0,0,.445-2.016c-.036-.692-.415-.674-.415-.674a10.549,10.549,0,0,0,.409-3.086C21.5,6.937,19.565,4.5,16.058,4.5c-3.556,0-5.451,2.437-5.4,4.909a11,11,0,0,0,.4,3.086s-.379-.018-.415.674a8.524,8.524,0,0,0,.445,2.016c.168.866.668.866.668.866a16.84,16.84,0,0,0,.505,2.28,8.924,8.924,0,0,0,.686,1.306,12.672,12.672,0,0,1-.1,2.966,3.185,3.185,0,0,1-1.45.668,28.035,28.035,0,0,0-3.135.6c-.854.3-3.327,1.233-3.76,3.147a.481.481,0,0,0,.475.584H27.122A.48.48,0,0,0,27.592,27.02Z" transform="translate(-4.501 -4.5)"/> 
                            </svg>                             
                        </div> <div>
                            <?php _e( 'Login', 'tb_theme' ); ?>
                        </div></a> 
                </div>                 
            </div>             
            <div id="wrapper-navbar" class="bg-white pl-sm-1 pr-sm-1"> 
                    <div class="container standard_nav" <?php if(!empty($_GET['context']) && $_GET['context'] === 'edit') echo 'data-wp-inner-blocks'; ?>>
                    <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo PG_Blocks_v2::getInnerContent( $args ); ?>
                </div>                 
            </div>             
        </div>         
    </div>     
</div>