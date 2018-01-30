<?php
$json = '{
    "payload": {
        "task": "send",
        "secret": "secret_key",
        "messages": [
            {
                "to": "+000-000-0000",
                "message": "the message goes here",
                "uuid": "042bf515-eq6b-f424-c4pz"
            }
        ]
    }
}';

$arra = json_decode($json);
var_dump($arra);
?>
