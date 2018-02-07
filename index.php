<?php
require __DIR__ . '/vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;
echo __DIR__ ;
// You can pass a filename, a HTML string, an URL or an options array to the constructor
$pdf = new Pdf('http://beta.crouchsales.co.za/catalogues/generate_catalogue/'.$_POST['catalogue_id']);

// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs($_POST['catalogue_name'].'.pdf')) {
    echo $pdf->getError();
}else {
  // the message
  $msg = "Your catalogue is ready!\nGet it here.";

  // use wordwrap() if lines are longer than 70 characters
  // $msg = wordwrap($msg,70);

  // send email
  mail("originalmmd@gmail.com","Testing the catalogue",$msg);
}


 ?>
