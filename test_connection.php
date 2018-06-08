<?php

// $link = mysql_connect('crouchsales.co.za', 'crouchsalesco_crouchbeta', '@Change.Score.50!');
// if (!$link) {
//     die('Not connected : ' . mysql_error());
// }
//
// // make foo the current db
// $db_selected = mysql_select_db('crouchsalesco_crouchbeta', $link);
// if (!$db_selected) {
//     die ('Can\'t use foo : ' . mysql_error());
// }
//
// $result = mysql_query("SELECT * FROM email_reportings");
// $results = mysql_fetch_assoc($result);
// print_r($results);
echo "working";

$hostname='138.201.19.4';
$username='crouchsalesco_crouchbeta';
$password='@Change.Score.50!';
$dbname='crouchsalesco_crouchbeta';
$usertable='test';
$yourfield = 'lat';

mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
 ?>
