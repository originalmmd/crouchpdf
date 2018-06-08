<?php
$link = mysql_connect('crouchsales.co.za', 'crouchsalesco_crouchbeta', '@Change.Score.50!');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('crouchsalesco_crouchbeta', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

$result = mysql_query("SELECT * FROM email_reportings");
$results = mysql_fetch_assoc($result);
print_r($results);


 ?>
