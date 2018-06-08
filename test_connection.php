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
// echo "working";
//
// $hostname='crouchsales.co.za';
// $username='crouchsalesco_crouchbeta';
// $password='@Change.Score.50!';
// $dbname='crouchsalesco_crouchbeta';
// $usertable='email_reportings';
// echo "Vars set";
//
// mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
// echo "Connected";
//
// mysql_select_db($dbname);
// echo "DB Selected";
//
// $result = mysql_query("INSERT INTO email_reportings (status,error,order_id) VALUES ('Test Done','No Error','999')");
// echo "Query executed";
//
// // $result = mysql_query($query);
// if($result === FALSE) {
//   print "MySQL error";
// }
// else {
//   echo "Done";
// }
//
// echo "End of file";
//extract data from the post
//set POST variables
// $url = 'http://beta.crouchsales.co.za/order/email_reportings_post';
// $fields = array(
// 	'status' => urlencode($_POST['status']),
// 	'error' => urlencode($_POST['error']),
// 	'order_id' => urlencode($_POST['order_id']),
// );
//
// //url-ify the data for the POST
// foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
// rtrim($fields_string, '&');
//
// //open connection
// $ch = curl_init();
//
// //set the url, number of POST vars, POST data
// curl_setopt($ch,CURLOPT_URL, $url);
// curl_setopt($ch,CURLOPT_POST, count($fields));
// curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
//
// //execute post
// $result = curl_exec($ch);
//
// //close connection
// curl_close($ch);
$params=['status'=>'Testing', 'error'=>'none', 'order_id'=>999);
$defaults = array(
CURLOPT_URL => 'http://beta.crouchsales.co.za/order/email_reportings_post',
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch, ($options + $defaults));

 ?>
