#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');



$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = $_POST['account'];
$request['username'] = $_POST['username'];
$request['password'] = $_POST['password'];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

$result = $_GET[$login];
echo 'Result: '.$result;
//echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";
echo $login;

/*
if($success == 'success'){
  header("Refresh:3; url=gamepage.html");
}
else{
header("Refresh:3; url=index.html");
}

*/





//header("Refresh:3; url=gamepage.html");

echo "<br> END".PHP_EOL;
