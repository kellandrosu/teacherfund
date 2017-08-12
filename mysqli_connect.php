<?php
// Opens a connection to the database
// This is saved outside of the main web documents folder
// and imported when needed into the other PHP files.

DEFINE ('DB_USER', 'kellandr-db');
DEFINE ('DB_PASSWORD', '6n9dKqzI5XVx1ZeP');
DEFINE ('DB_HOST', 'oniddb.cws.oregonstate.edu');
DEFINE ('DB_NAME', 'kellandr-db');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>