apg-api
=======

API Wrappers for the APG API

Example code:

<?php

require_once("apg-api.php");
$api = new apgApi();

$pid = $api->getPid('AFA4991');
echo "<p>Name: " . $pid->name . "</p>";

$logbook = $api->getLogbook('AFA4991');

foreach ($logbook as $flight) {
    echo "<p>Departure Airport: " . $flight->dep . "</p>";
}
