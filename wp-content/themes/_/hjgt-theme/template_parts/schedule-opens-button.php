<?php

$set_transient = 'opens-button';


if( get_transient( $set_transient ) ) {
    $decodedResponse = get_transient( $set_transient );
} else {
    $curl = curl_init();
        $set_curl_url = 'https://service.shotstat.com/Schedule/GetHurricaneSchedule?upcomingpast=upcoming&categoryName=Open';
    

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
        
    endforeach; 
    
endif; ?>
<div class="buttonsStates">
<?php if ($cat_opens > 0) : ?>
    <a class="btn btn-secondary" href="https://tournaments.hjgt.org/Tournament?CID=44&stateid=<?php echo $state_id; ?>">See <?php echo _n( '', 'All ', $cat_opens ).'<strong>'.$cat_opens.'</strong> Upcoming '._n( 'Open', 'Opens', $cat_opens ) ?></a>
<?php endif; ?>
</div>