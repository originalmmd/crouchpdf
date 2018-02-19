<?php
require __DIR__ . '/vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
// echo __DIR__ ;
// You can pass a filename, a HTML string, an URL or an options array to the constructor
$pdf = new Pdf('http://beta.crouchsales.co.za/order/download_pdf/'.$_POST['order_id']);

// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs('orders/'.$_POST['order_id'].'.pdf')) {
    echo $pdf->getError();
}


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
  //Server settings
  $mail->SMTPDebug = 2;                                 // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'mail.crouchsales.co.za';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'sales@crouchsales.co.za';                 // SMTP username
  $mail->Password = '@Change.Score.50!';                           // SMTP password
  // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 26;                                    // TCP port to connect to

  $to  = $_POST['user_email'].', originalmmd@gmail.com,'.$_POST['customer_email'] ;
  //Recipients
  $mail->setFrom('sales@crouchsales.co.za', 'sales@crouchsales.co.za');
  $mail->addAddress($_POST['user_email']);     // Add a recipient
  $mail->addAddress('originalmmd@gmail.com');               // Name is optional
  $mail->addReplyTo('sales@crouchsales.co.za');
  // if (!$_POST['customer_email'] == NULL) {
  //   $mail->addCC($_POST['customer_email']);
  // }

  // $mail->addBCC('bcc@example.com');

  //Attachments
  // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  $msg1 = '<p>Dear Customer</p><p>A new crouch footwear order has been generated for you.</p><p>Best Regards</p><p>Crouch Footwear</p><p></p><h4>Download it <a href="http://108.61.211.236/crouchpdf/orders/';
  $msg2 = '.pdf">here</a></h4>';
  $msg = $msg1.$_POST['order_id'].$msg2;
  //Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'New order';
  $mail->Body    = $msg;
  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}








  // $headers  = 'MIME-Version: 1.0' . "\r\n";
  // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  // $headers .= 'From: sales@crouchfootwear.co.za' . "\r\n";
  // $to  = $_POST['user_email'].', originalmmd@gmail.com,'.$_POST['customer_email'] ; // note the comma
  // $to .= 'originalmmd@gmail.com';
  echo $to;
  // send email
  // mail($to,"New Crouch Footwear Catalogue",$msg, $headers);



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
     <div class="row">
       <div class="col-xs-4">

       </div>
       <div class="col-xs-4">
         <img src="crouchlogo.jpg" alt="" class="text-center" style="width:100%">
       </div>
       <div class="col-xs-4">

       </div>
     </div>


     <div class="row">
       <div class="col-xs-4">

       </div>
       <div class="col-xs-4">
         <div class="panel panel-success">
           <div class="panel-heading">
             <h3 class="panel-title">Your file is ready</h3>
           </div>
           <div class="panel-body text-center">
             <label for="link">Copy and paste this link into your email message:</label>
             <input type="text" name="link" value="http://108.61.211.236/crouchpdf/orders/<?php echo $_POST['order_id'] ?>.pdf" class="form-control">
             <br><br><a href="http://108.61.211.236/crouchpdf/orders/<?php echo $_POST['order_id'] ?>.pdf" class="btn btn-primary">Download</a>
             <br><br><a href="http://beta.crouchsales.co.za/admin" class="btn btn-default">Back home</a>
           </div>
         </div>
       </div>
       <div class="col-xs-4">

       </div>
     </div>

   </body>
 </html>
