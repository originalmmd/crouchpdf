<?php
require __DIR__ . '/vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;
echo __DIR__ ;
// You can pass a filename, a HTML string, an URL or an options array to the constructor
$pdf = new Pdf('http://beta.crouchsales.co.za/catalogues/generate_catalogue/175');

// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs('175.pdf')) {
    echo $pdf->getError();
}
 ?>
