<?php 

    $from = "INR";
    $to = "USD";
    $price = "100";

    $url = "https://www.google.com/finance/converter?a=$price&from=$from&to=$to";
    $curl_connection = curl_init();  
 
    curl_setopt($curl_connection,CURLOPT_URL,$url);
 
    curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($curl_connection, CURLOPT_USERAGENT,
    "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
    curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

    $output=curl_exec($curl_connection);
    //print_r($output);

    $doc = new DOMDocument();
    @$doc->loadHTML($output);
    $nodes = $doc->getElementsByTagName('span');
    $title = $nodes->item(0)->nodeValue;
    echo substr($title,0,-3);

?>