<?php 

require('Pusher.php');

$APP_KEY = "cd9b0ab0394f28bbcc2a";
$APP_SECRET = "a8c39dfd46289904c263";
$APP_ID = "64881";


$channel = "";
$event = "";
$message = "";


$pusher = new Pusher($APP_KEY, $APP_SECRET, $APP_ID);


if(!isset($_REQUEST['payload'])) {

if(isset($_REQUEST['channel'])) $channel = $_REQUEST['channel'];
if(isset($_REQUEST['event'])) $event = $_REQUEST['event'];
if(isset($_REQUEST['message'])) $message = $_REQUEST['message'];
$response = $pusher->trigger($channel, $event, array( 'message' => $message));

} else {

$arr = json_decode($_REQUEST['payload']);

foreach($arr as $item) {

	$response = $pusher->trigger($item->channel, $item->evento, array( 'number'=> $item->number , 'message' => json_encode($item->message)));

} 

}
?>


