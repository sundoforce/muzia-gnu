<?php
include_once('./_common.php');

$msg = array();
@include_once($G5_ATTENDANCE_URL.'/msg/'.$q);
$msg_cnt = count($msg);

$mtxt = '';
if($msg_cnt) {
	shuffle($msg); // 섞기
	$mtxt .= $msg[0];
}

echo '{ "msg": "' . $mtxt . '" }';
?>