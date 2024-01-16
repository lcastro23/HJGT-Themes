<div <?php if(empty($_GET['context']) || $_GET['context'] !== 'edit') echo get_block_wrapper_attributes( array('class' => "tournResultsSingle", ) ); else echo 'data-wp-block-props="true"'; ?>> 
    <?php
        $divisionRaw = PG_Blocks_v2::getAttribute( $args, 'division' );
        $division = rawurlencode($divisionRaw);
        
        $ranking_systemRaw = PG_Blocks_v2::getAttribute( $args, 'ranking_system' );
        $ranking_system = rawurlencode($ranking_systemRaw);
        
        $setTransient = 'standings';
        $setTransient .= $division;
        $setTransient .= $ranking_system;
        
        if( get_transient( $setTransient ) ) {
            $decodedStandingResponse = get_transient( $setTransient );
        } else {
            $curl = curl_init(); 
            $set_curl_url = 'https://service.shotstat.com/Standings/GetHurricaneStandings?count=5';
        
            if ($divisionRaw != '') {
                $set_curl_url .= '&division='.$division;
            }
            if ($ranking_system != '') {
                $set_curl_url .= '&tourRankingSystem='.$ranking_system;
            }
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => $set_curl_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                //CURLOPT_SSL_VERIFYPEER => false, //remove for production
                CURLOPT_HTTPHEADER => array(
                    'Cookie: ASP.NET_SessionId=n4o2yseao43xlmlz2pez0yvp'
                ),
            ));
        
            $response = curl_exec($curl);
        
            curl_close($curl);
            $decodedStandingResponse = json_decode($response, true);
        
            set_transient( $setTransient, $decodedStandingResponse, 86400 );
        }
        
    ?> 
    <div class="row"> 
        <div class="col"> 
            <div class="head"> 
                <div class="h3 mb-0">
                    <?php echo PG_Blocks_v2::getAttribute( $args, 'div_results' ) ?>
                </div>                 <a class="seeMore" href="<?php echo esc_url( 'https://tournaments.hjgt.org/public/standings?DivisionID='.PG_Blocks_v2::getAttribute( $args, 'div_id' ) ); ?>" target="_blank"><?php _e( 'See Full Details', 'tb_theme' ); ?></a> 
            </div>             
        </div>         
    </div>     
    <div class="row"> 
        <?php if ($decodedStandingResponse) {
    $first_place_data = $decodedStandingResponse[0];
    $PlayerName = $first_place_data['PlayerName'];
    $PlayerImageUrl = $first_place_data['PlayerImageUrl'];
    $Rank = $first_place_data['Rank'];
    $HomeTown = $first_place_data['HomeTown'];
    $HighschoolGradYear = $first_place_data['HighschoolGradYear'];
    $Points = $first_place_data['Points'];
} ?>
        <div class="col-lg-4"> 
            <div class="firstPlaceArea"> 
                <div class="gradient"></div>                 
                <div class="playerData"> 
                    <div class="rank"> <span><?php _e( 'No.&nbsp;', 'tb_theme' ); ?></span> <span><?php echo $Rank ?></span> 
                    </div>                     
                    <div class="playerInfo"> 
                        <div class="name">
                            <?php echo $PlayerName ?>
                        </div>                         
                        <div class="playerLocation"> 
                            <div class="meta"> <span><?php echo $HomeTown ?></span> <span>&bull;</span> <span><?php echo $HighschoolGradYear ?></span> 
                            </div>                             
                        </div>                         
                        <div class="point">
                            <?php echo $Points ?>
                        </div>                         
                    </div>                     
                </div>                 
                <?php if ( $PlayerImageUrl != "" ) : ?>
                    <div class="eventImg"> 
                        <img src="<?php echo $PlayerImageUrl; ?>"/> 
                    </div>                     
                <?php else : ?>
                    <div class="eventImg"> 
                        <?php if ( str_contains($divisionRaw, 'Boy') ) : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Placeholder.jpg" alt="Boys Bio Image"/> 
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Placeholder.jpg" alt="Girls Bio Image"/>
                        <?php endif; ?> 
                    </div>
                <?php endif; ?> 
            </div>             
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
                        <?php _e( 'Points', 'tb_theme' ); ?>
                    </div>                     
                    <div class="tborder"></div>                     
                </div>                 
                <div class="tbody"> 
                    <?php
                        if ($decodedStandingResponse) :
                        foreach ($decodedStandingResponse as $value) :
                            ${$division.'_rank'} = $value['Rank'];
                            ${$division.'_name'} = $value['PlayerName'];
                            ${$division.'_home_town'} = $value['HomeTown'];
                            ${$division.'_grad_year'} = $value['HighschoolGradYear'];
                            ${$division.'_points'} = $value['Points'];
                            ${$division.'_page_url'} = $value['PlayerPage'];
                            ${$division.'_image'} = $value['PlayerImageUrl'];
                    ?> 
                    <div class="td"> <span><?php _e( 'No.', 'tb_theme' ); ?> <?php echo ${$division.'_rank'}; ?></span> <span><?php _e( 'Rank', 'tb_theme' ); ?></span> 
                    </div>                     
                    <div class="td"> 
                        <div class="playerInfo"> 
                            <div class="bioHeadshot"> 
                                <?php if ( ${$division.'_image'} != "" ) : ?>
                                    <img src="<?php echo ${$division.'_image'}; ?>"/> 
                                <?php elseif ( str_contains($divisionRaw, 'Boy') ) : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/a_images/Boy-Headshot-Thumbnail.svg" alt="Boys Bio Image"/> 
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/a_images/Girl-Headshot-Thumbnail.svg" alt="Girls Bio Image"/>
                                <?php endif; ?> 
                            </div>                             
                            <div class="bioMeta"> <a class="name" target="_blank" href="<?php echo esc_url( ${$division.'_page_url'} ); ?>"><?php echo ${$division.'_name'}; ?></a> 
                                <div class="meta"> <span><?php echo ${$division.'_home_town'} ?></span> <span>&bull;</span> <span><?php echo ${$division.'_grad_year'} ?></span> 
                                </div>                                 
                            </div>                             
                        </div>                         
                    </div>                     
                    <div class="td"> <span><?php if (${$division.'_points'} > 0) {
                                    echo "+".${$division.'_points'};
                                } elseif (${$division.'_points'} < 0) {
                                    echo ${$division.'_points'};
                                } else {
                                    echo "- -";
                            } ?></span> <span><?php _e( 'Points', 'tb_theme' ); ?></span> 
                    </div>                     
                    <?php
                        endforeach;
                        endif;
                    ?> 
                </div>                 
            </div>             
        </div>         
    </div>     
</div>