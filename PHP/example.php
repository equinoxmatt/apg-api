<?php

require_once("apg-api.php");
$api = new apgApi();

$pid = $api->getPid('AFAXXXX');
echo "<p>Name: " . $pid->name . "</p>";

$logbook = $api->getLogbook('AFAXXXX');

foreach ($logbook as $flight) {
    echo "<p>Departure Airport: " . $flight->dep . "</p>";
}

$auth = $api->authenticate('AFAXXXX', 'password');

var_dump($auth);