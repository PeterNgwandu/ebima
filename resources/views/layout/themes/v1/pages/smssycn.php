<?php
$msg[]  = [ "to" => "+000-000-0000", "message" => "the message goes here", "uuid" => "042bf515-eq6b-f424-c4pz", ];
$sms    = [ "payload" => [ "task" => "send", "secret" => "", "messages" => $msg ] ];
echo "<pre>"; print_r($sms); echo "</pre>";
?>
