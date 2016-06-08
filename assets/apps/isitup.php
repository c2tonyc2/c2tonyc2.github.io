<?php
$user_agent = "IsitupForSlack/1.0 (https://github.com/mccreath/istiupforslack; mccreath@gmail.com)";
$command = $_POST['command'];
$domain = $_POST['text'];
$token = $_POST['token'];

if($token != '2kHanHLJphNwMFXT937PUfLa'){
    $msg = "The token for the slash command doesn't match. Check your script.";
    die($msg);
    echo $msg;
}

$url_to_check = "https://isitup.org/".$domain.".json";

$ch = curl_init($url_to_check);
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$ch_response = curl_exec($ch);
curl_close($ch);

if($ch_response === FALSE){
  # isitup.org could not be reached
  $reply = "Ironically, isitup could not be reached.";
}else{
  if($response_array["status_code"] == 1){
  	# Yay, the domain is up!
    $reply = ":thumbsup: I am happy to report that *<http://".$response_array["domain"]."|".$response_array["domain"].">* is *up*!";
  } else if($response_array["status_code"] == 2){
    # Boo, the domain is down.
    $reply = ":disappointed: I am sorry to report that *<http://".$response_array["domain"]."|".$response_array["domain"].">* is *not up*!";
  } else if($response_array["status_code"] == 3){
    # Uh oh, isitup.org doesn't think the domain entered by the user is valid
    $reply = ":interrobang: *".$text."* does not appear to be a valid domain. \n";
    $reply .= "Please enter both the domain name AND suffix (example: *amazon.com* or *whitehouse.gov*).";
  }
}
# Send the reply back to the user.
echo $reply;