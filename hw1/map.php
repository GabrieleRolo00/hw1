<?php

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://google-maps-search1.p.rapidapi.com/search",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => '{ "limit": 2, "language": "en", "region": "us", "queries": ["Lawyers near San Francisco, CA, US", "Lawyers near New York, NY, US", "Graphic Designers in Chicago"], "coordinates": "37.381315,-122.046148" }',
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: google-maps-search1.p.rapidapi.com",
            "X-RapidAPI-Key: d46aa667e2msh6a458b2bbc1a43ep158fb2jsnb3da80941729",
            "content-type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
?>

