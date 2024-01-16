<?php
$keyword = urlencode($args['event_keyword']);
$category = urlencode($args['event_category']);
$setTransient = 'allEvents';

if ($keyword != '' && $category != '') {
    $setTransient .= $keyword;
    $setTransient .= $category;
} elseif ($keyword != '') {
    $setTransient .= $keyword;
} elseif ($category != '') {
    $setTransient .= $category;
}

if( get_transient( $setTransient ) ) {
    $decodedResponse = get_transient( $setTransient );
} else {
    $curl = curl_init();
    if ($keyword != '' && $category != '') {
        $set_curl_url = 'https://service.shotstat.com/Schedule/GetHurricaneSchedule?upcomingpast=upcoming';
        $set_curl_url .= '&keyword='.$keyword;
        $set_curl_url .= '&categoryName='.$category;
    } elseif ($keyword != '') {
        $set_curl_url = 'https://service.shotstat.com/Schedule/GetHurricaneSchedule?upcomingpast=upcoming';
        $set_curl_url .= '&keyword='.$keyword;
    } elseif ($category != '') {
        $set_curl_url = 'https://service.shotstat.com/Schedule/GetHurricaneSchedule?upcomingpast=upcoming';
        $set_curl_url .= '&categoryName='.$category;
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
 
    set_transient( $setTransient, $decodedResponse, 86400 );
}

get_template_part( 'template_parts/schedule', 'dresponceloop',
array(
    'decodedResponse' => $decodedResponse
) 
);