<?php
$state_abr = $args['state_abr'];
$state_urlP = '&stateAbbreviation='.$state_abr;
$state_id = $args['state_id'];
$set_transient = 'state-buttons'.$state_abr;


if( get_transient( $set_transient ) ) {
    $decodedResponse = get_transient( $set_transient );
} else {
    $curl = curl_init();
    if ($state_abr != '') {
        $set_curl_url = 'https://service.shotstat.com/Schedule/GetHurricaneSchedule?upcomingpast=upcoming';
        $set_curl_url .= $state_urlP;
    } else {
        $set_curl_url = 'https://service.shotstat.com/Schedule/GetHurricaneSchedule?upcomingpast=upcoming';
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
    // CURLOPT_SSL_VERIFYPEER => false, //remove for production
    CURLOPT_HTTPHEADER => array(
        'Cookie: ASP.NET_SessionId=czb5qp2vwq2qmmnadbajnczj'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $decodedResponse = json_decode($response, true);
 
    set_transient( $set_transient, $decodedResponse, 86400 );
}

$sliced_decodedResponse = array_slice($decodedResponse, 0, 4);

echo '<div class="scheduleUpcomming"><div class="commingUpLoop recentPostsSimpleCard">';

get_template_part( 'template_parts/schedule', 'dresponceloop',
array(
    'decodedResponse' => $sliced_decodedResponse
) 
);

echo '</div></div>';

if ($decodedResponse) :
    $cat_opens = 0;
    $cat_major = 0;
    $cat_college_prep = 0;
    $cat_invitational = 0;

    foreach ($decodedResponse as $value):

        $tourn_category = $value['Category'];

        if ($tourn_category == "Open") {
            $cat_opens++;
        } 
        
        if ($tourn_category == "Major") {
            $cat_major++;
        }

        if ($tourn_category == "College Prep") {
            $cat_college_prep++;
        }

        if ($tourn_category == "Invitational") {
            $cat_invitational++;
        }
    endforeach; 
    
endif; ?>
<div class="buttonsStates">
<?php if ($cat_opens > 0) : ?>
    <a class="btn btn-secondary" href="https://tournaments.hjgt.org/Tournament?CID=44&stateid=<?php echo $state_id; ?>">See <?php echo _n( '', 'All ', $cat_opens ).'<strong>'.$cat_opens.'</strong> Upcoming '._n( 'Open', 'Opens', $cat_opens ).' in '.$state_abr; ?></a>
<?php endif; if ($cat_major > 0) : ?>
    <a class="btn btn-secondary" href="https://tournaments.hjgt.org/Tournament?CID=45&stateid=<?php echo $state_id; ?>">See <?php echo _n( '', 'All ', $cat_major ).'<strong>'.$cat_major.'</strong> Upcoming '._n( 'Major', 'Majors', $cat_major ).' in '.$state_abr; ?></a>
<?php endif; if ($cat_college_prep > 0) : ?>
    <a class="btn btn-secondary" href="https://tournaments.hjgt.org/Tournament?CID=48&stateid=<?php echo $state_id; ?>">See <?php echo _n( '', 'All ', $cat_college_prep ).'<strong>'.$cat_college_prep.'</strong> Upcoming '._n( 'College Prep', 'College Preps', $cat_college_prep ).' in '.$state_abr; ?></a>
<?php endif; if ($cat_invitational > 0) : ?>
    <a class="btn btn-secondary" href="https://tournaments.hjgt.org/Tournament?CID=46&stateid=<?php echo $state_id; ?>">See <?php echo _n( '', 'All ', $cat_invitational ).'<strong>'.$cat_invitational.'</strong> Upcoming '._n( 'Invitational', 'Invitationals', $cat_invitational ).' in '.$state_abr; ?></a>
<?php endif; ?>
</div>