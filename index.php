<?php
require __DIR__ . '/vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;
// echo __DIR__ ;
// You can pass a filename, a HTML string, an URL or an options array to the constructor
$pdf = new Pdf('http://beta.crouchsales.co.za/catalogues/generate_catalogue/'.$_POST['catalogue_id']);

// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs($_POST['catalogue_name'].'.pdf')) {
    echo $pdf->getError();
}
  // the message
  $msg1 = '<h4>A new crouch footwear catalogue has been generated for you.</h4><br><h4>Get it <a href="http://108.61.211.236/crouchpdf/';
  $msg2 = '.pdf">here</a></h4>';
  $msg = $msg1.$_POST['catalogue_id'].$msg2;
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: Crouch Footwear <sales@crouchfootwear.co.za>' . "\r\n";
  $to  = $_POST['user_email'] . ', '; // note the comma
  $to .= 'originalmmd@gmail.com';
  // send email
  mail($to,"New Crouch Footwear Catalogue",$msg, $headers);



 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </head>
   <body>
     <br>
     <br>
     <br>
     <div class="col-xs-4">

     </div>
     <div class="col-xs-4">
       <div class="panel panel-success">
         <div class="panel-heading">
           <h3 class="panel-title">Your file is ready</h3>
         </div>
         <div class="panel-body text-center">
           <label for="link">Copy and paste this link into your email message:</label>
           <input type="text" name="link" value="http://108.61.211.236/crouchpdf/<?php echo $_POST['catalogue_id'] ?>.pdf">
           <br><br><a href="http://108.61.211.236/crouchpdf/<?php echo $_POST['catalogue_id'] ?>.pdf" class="btn btn-primary">Download</a>
           <br><br><a href="http://beta.crouchsales.co.za/admin" class="btn btn-default">Back home</a>
         </div>
       </div>
     </div>
     <div class="col-xs-4">

     </div>
   </body>
 </html>
