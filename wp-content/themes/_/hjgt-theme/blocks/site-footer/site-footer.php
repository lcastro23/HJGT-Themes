<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "site-footer-block", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <div id="jr_wrapper_footer" class="wrapper_footer-1"> 
            <div class="bg-primary dark footer_upper" <?php if(!empty($_GET['context']) && $_GET['context'] === 'edit') echo 'data-wp-inner-blocks'; ?>>
            <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo PG_Blocks_v2::getInnerContent( $args ); ?>
        </div>         
        <div class="bg-primary dark footer_lower"> 
            <div class="container"> 
                <div class="row justify-content-center align-items-center" id="footer_rights"> 
                    <div class="col-lg-8 order-last order-md-first text-center text-md-left"> 
                        <div class="copy_right"> <span>&copy;</span> <span><?php echo date('Y'); ?></span> <span><?php echo get_theme_mod( 'contact_info_company_name', __( 'Site Name', 'tb_theme' ) ); ?></span> <span class="text-secondary">|</span> <a href="https://tbsmo.com/" target="_blank"><?php _e( 'Website Design by Today&apos;s Business', 'tb_theme' ); ?></a> <span class="text-secondary">|</span> <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php _e( 'Privacy Policy', 'tb_theme' ); ?></a> <span class="text-secondary">|</span> <a href="<?php echo esc_url( get_site_url().'/sitemap/' ); ?>"><?php _e( 'Sitemap', 'tb_theme' ); ?></a> 
                        </div>                         
                    </div>                     
                    <div class="col-lg-4 text-center text-md-right"> 
                        <div class="foot_social"> 
                            <?php if ( get_theme_mod( 'fb_show' ) ) : ?>
                                <a class="soc_link" href="<?php echo get_theme_mod( 'fb_link', 'filler' ); ?>" target="_blank"><div class="icon"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.281" height="36" viewBox="0 0 19.281 36" fill="currentColor" class="img-fluid"> 
                                            <path d="M19.627,20.25l1-6.515H14.375V9.507c0-1.782.873-3.52,3.673-3.52h2.842V.44A34.658,34.658,0,0,0,15.846,0C10.7,0,7.332,3.12,7.332,8.769v4.965H1.609V20.25H7.332V36h7.043V20.25Z" transform="translate(-1.609)"/> 
                                        </svg>                                         
                                    </div></a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'yt_show' ) ) : ?>
                                <a class="soc_link" href="<?php echo get_theme_mod( 'yt_link', 'filler' ); ?>" target="_blank"><div class="icon"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38.4" height="27" viewBox="0 0 38.4 27" fill="currentColor" class="img-fluid"> 
                                            <path d="M38.648,8.725a4.825,4.825,0,0,0-3.395-3.417c-2.995-.808-15-.808-15-.808s-12.008,0-15,.808A4.825,4.825,0,0,0,1.852,8.725c-.8,3.014-.8,9.3-.8,9.3s0,6.289.8,9.3a4.753,4.753,0,0,0,3.395,3.362c2.995.808,15,.808,15,.808s12.008,0,15-.808a4.753,4.753,0,0,0,3.395-3.362c.8-3.014.8-9.3.8-9.3s0-6.289-.8-9.3ZM16.323,23.737V12.318l10.036,5.71L16.323,23.737Z" transform="translate(-1.05 -4.5)"/> 
                                        </svg>                                         
                                    </div></a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'li_show' ) ) : ?>
                                <a class="soc_link" href="<?php echo get_theme_mod( 'li_link', 'filler' ); ?>" target="_blank"><div class="icon"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.5" height="31.5" viewBox="0 0 31.5 31.5" fill="currentColor" class="img-fluid"> 
                                            <path d="M7.051,31.5H.52V10.47H7.051ZM3.782,7.6A3.8,3.8,0,1,1,7.564,3.783,3.814,3.814,0,0,1,3.782,7.6ZM31.493,31.5H24.976V21.263c0-2.44-.049-5.569-3.4-5.569-3.4,0-3.916,2.651-3.916,5.393V31.5H11.142V10.47h6.263v2.869H17.5a6.862,6.862,0,0,1,6.179-3.4c6.609,0,7.824,4.352,7.824,10.005V31.5Z" transform="translate(0 0)"/> 
                                        </svg>                                         
                                    </div></a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'tw_show' ) ) : ?>
                                <a class="soc_link" href="<?php echo get_theme_mod( 'tw_link', 'filler' ); ?>" target="_blank"><div class="icon"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31.723" viewBox="0 0 31 31.723" fill="currentColor" class="img-fluid"> 
                                            <g transform="translate(0)"> 
                                                <path d="M14.689,17.676l-1.173-1.707-9.57-13.9H8.063L15.8,13.31l1.173,1.707,10.079,14.64H22.939ZM.017,0,2.243,3.237l9.88,14.352,1.176,1.7,7.937,11.534.615.894h9.131l-2.228-3.237L18.368,13.4,17.194,11.69,9.764.9,9.148,0Z" transform="translate(0.017 0)"/> 
                                                <path d="M12.141,9.4,0,23.538H2.635L13.315,11.11l1.393-1.621-1.173-1.7Z" transform="translate(0 8.185)"/> 
                                                <path d="M19.159,0,16.9,2.611,9.1,11.689,7.711,13.31l1.173,1.707L10.278,13.4,21.791,0Z" transform="translate(8.108 0)"/> 
                                            </g>                                             
                                        </svg>                                         
                                    </div></a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'pinter_show' ) ) : ?>
                                <a class="soc_link" href="<?php echo get_theme_mod( 'pinter_link', 'filler' ); ?>" target="_blank"><div class="icon"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="35.094" viewBox="0 0 27 35.094" fill="currentColor" class="img-fluid"> 
                                            <path d="M14.344.457C7.13.457,0,5.266,0,13.05,0,18,2.784,20.813,4.472,20.813c.7,0,1.1-1.941,1.1-2.489,0-.654-1.666-2.046-1.666-4.767A9.5,9.5,0,0,1,13.774,3.9c4.788,0,8.332,2.721,8.332,7.72,0,3.734-1.5,10.737-6.349,10.737a3.122,3.122,0,0,1-3.248-3.08c0-2.658,1.856-5.231,1.856-7.973,0-4.655-6.6-3.811-6.6,1.814a8.26,8.26,0,0,0,.675,3.565c-.97,4.177-2.953,10.4-2.953,14.7,0,1.329.19,2.637.316,3.966.239.267.12.239.485.105C9.83,30.6,9.7,29.651,11.306,23.3c.865,1.645,3.1,2.531,4.873,2.531C23.646,25.833,27,18.555,27,12,27,5.013,20.967.457,14.344.457Z" transform="translate(0 -0.457)"/> 
                                        </svg>                                         
                                    </div></a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'insta_show' ) ) : ?>
                                <a class="soc_link" href="<?php echo get_theme_mod( 'insta_link', 'filler' ); ?>" target="_blank"><div class="icon"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.518" height="31.51" viewBox="0 0 31.518 31.51" fill="currentColor" class="img-fluid"> 
                                            <path d="M15.757,9.914a8.079,8.079,0,1,0,8.079,8.079A8.066,8.066,0,0,0,15.757,9.914Zm0,13.331a5.252,5.252,0,1,1,5.252-5.252,5.262,5.262,0,0,1-5.252,5.252ZM26.051,9.584A1.884,1.884,0,1,1,24.166,7.7,1.88,1.88,0,0,1,26.051,9.584ZM31.4,11.5a9.325,9.325,0,0,0-2.545-6.6,9.387,9.387,0,0,0-6.6-2.545c-2.6-.148-10.4-.148-13,0a9.373,9.373,0,0,0-6.6,2.538,9.356,9.356,0,0,0-2.545,6.6c-.148,2.6-.148,10.4,0,13a9.325,9.325,0,0,0,2.545,6.6,9.4,9.4,0,0,0,6.6,2.545c2.6.148,10.4.148,13,0a9.325,9.325,0,0,0,6.6-2.545,9.387,9.387,0,0,0,2.545-6.6c.148-2.6.148-10.392,0-12.994ZM28.041,27.281a5.318,5.318,0,0,1-3,3c-2.074.823-7,.633-9.288.633s-7.221.183-9.288-.633a5.318,5.318,0,0,1-3-3c-.823-2.074-.633-7-.633-9.288s-.183-7.221.633-9.288a5.318,5.318,0,0,1,3-3c2.074-.823,7-.633,9.288-.633s7.221-.183,9.288.633a5.318,5.318,0,0,1,3,3c.823,2.074.633,7,.633,9.288S28.863,25.214,28.041,27.281Z" transform="translate(0.005 -2.238)"/> 
                                        </svg>                                         
                                    </div></a>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'tiktok_show' ) ) : ?>
                                <a class="soc_link" href="<?php echo get_theme_mod( 'tiktok_link', 'filler' ); ?>" target="_blank"><div class="icon"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.276" height="36" viewBox="0 0 31.276 36" fill="currentColor" class="img-fluid"> 
                                            <path d="M18.8.03C20.76,0,22.71.015,24.66,0a9.343,9.343,0,0,0,2.625,6.255,10.578,10.578,0,0,0,6.36,2.685v6.045a16.055,16.055,0,0,1-6.3-1.455,18.533,18.533,0,0,1-2.43-1.4c-.015,4.38.015,8.76-.03,13.125a11.457,11.457,0,0,1-2.025,5.91A11.175,11.175,0,0,1,14,35.985a10.937,10.937,0,0,1-6.12-1.545A11.311,11.311,0,0,1,2.4,25.875c-.03-.75-.045-1.5-.015-2.235a11.292,11.292,0,0,1,13.1-10.02c.03,2.22-.06,4.44-.06,6.66a5.147,5.147,0,0,0-6.57,3.18,5.95,5.95,0,0,0-.21,2.415,5.105,5.105,0,0,0,5.25,4.305,5.039,5.039,0,0,0,4.155-2.415,3.461,3.461,0,0,0,.615-1.59c.15-2.685.09-5.355.1-8.04C18.78,12.09,18.75,6.06,18.8.03Z" transform="translate(-2.369)"/> 
                                        </svg>                                         
                                    </div></a>
                            <?php endif; ?> 
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </div>         
    </div>     
</div>