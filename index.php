<?php
echo "in the php tag";
require_once /phpwkhtmltopdf/src/Pdf.php;
echo "required";
// You can pass a filename, a HTML string, an URL or an options array to the constructor
$pdf = new Pdf('http://beta.crouchsales.co.za/catalogues/generate_catalogue/175');
echo "got the url";
// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs('page.pdf')) {

    echo $pdf->getError();
} ?>
