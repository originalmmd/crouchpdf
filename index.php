<?php
require __DIR__ . '/vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;
echo __DIR__ ;
// You can pass a filename, a HTML string, an URL or an options array to the constructor
$pdf = new Pdf('http://google.com');

// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs('/pdf-files/page.pdf')) {
    echo $pdf->getError();
}
 ?>
