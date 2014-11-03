<?php 

function get_web_page($url) 
{

    $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.104 Safari/537.36";

    $options = array(
        CURLOPT_CUSTOMREQUEST=>"GET",
        CURLOPT_POST           => false,
        CURLOPT_USERAGENT      => $user_agent,     // who am i 
        CURLOPT_RETURNTRANSFER => true,         // return web page 
        CURLOPT_HEADER         => false,        // don't return headers 
        CURLOPT_FOLLOWLOCATION => true,         // follow redirects 
        CURLOPT_ENCODING       => "",           // handle all encodings 
        CURLOPT_AUTOREFERER    => true,         // set referer on redirect 
        CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect 
        CURLOPT_TIMEOUT        => 120,          // timeout on response 
        CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects 
        CURLOPT_HTTPHEADER     => array("Cookie: PHPSESSID=fd295960dc37a2248a947f7faf4bce34")
    ); 

    $ch      = curl_init($url); 
    curl_setopt_array($ch,$options); 
    $content = curl_exec($ch); 
    $err     = curl_errno($ch); 
    $errmsg  = curl_error($ch) ; 
    $header  = curl_getinfo($ch); 
    curl_close($ch); 

    $header['errno']   = $err; 
    $header['errmsg']  = $errmsg; 
    $header['content'] = $content; 
    return $header; 
} 

$url = "http://jupt.tk/admin.php"; 

$response = get_web_page($url); 
echo $response['content'];

?>