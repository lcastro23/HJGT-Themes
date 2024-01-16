<?php

if( get_transient( 'upcomingFourOpens' ) ) {
    $decodedResponse = get_transient( 'upcomingFourOpens' );
} else {
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://service.shotstat.com/Schedule/GetHurricaneSchedule?categoryName=Open&count=2&upcomingpast=upcoming',
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
 
    set_transient( 'upcomingFourOpens', $decodedResponse, 86400 );
}

get_template_part( 'template_parts/schedule', 'dresponceloop',
array(
    'decodedResponse' => $decodedResponse
) 
);