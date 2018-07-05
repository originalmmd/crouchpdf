<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$phpWord = new \PhpOffice\PhpWord\PhpWord();

		// Begin code
		$section = $phpWord->addSection();
		$section->addText('Local image without any styles:');
		$section->addImage(base_url('resources/_mars.jpg'));
		$section->addTextBreak(2);

		$section->addText('Local image with styles:');
		$section->addImage('resources/_earth.jpg', array('width' => 210, 'height' => 210, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addTextBreak(2);

		// Remote image
		$source = 'http://php.net/images/logos/php-med-trans-light.gif';
		$section->addText("Remote image from: {$source}");
		$section->addImage($source);

		// Image from string
		$source = base_url('resources/_mars.jpg');
		$fileContent = file_get_contents($source);
		$section->addText('Image from string');
		$section->addImage($fileContent);

		//Wrapping style
		$text = str_repeat('Hello World! ', 15);
		$wrappingStyles = array('inline', 'behind', 'infront', 'square', 'tight');
		foreach ($wrappingStyles as $wrappingStyle) {
				$section->addTextBreak(5);
				$section->addText("Wrapping style {$wrappingStyle}");
				$section->addImage(
						'resources/_earth.jpg',
						array(
								'positioning'   => 'relative',
								'marginTop'     => -1,
								'marginLeft'    => 1,
								'width'         => 80,
								'height'        => 80,
								'wrappingStyle' => $wrappingStyle,
						)
				);
				$section->addText($text);
		}

		//Absolute positioning
		$section->addTextBreak(3);
		$section->addText('Absolute positioning: see top right corner of page');
		$section->addImage(
				base_url('resources/_mars.jpg'),
				array(
						'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(3),
						'height'           => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(3),
						'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
						'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_RIGHT,
						'posHorizontalRel' => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
						'posVerticalRel'   => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
						'marginLeft'       => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(15.5),
						'marginTop'        => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.55),
				)
		);

		//Relative positioning
		$section->addTextBreak(3);
		$section->addText('Relative positioning: Horizontal position center relative to column,');
		$section->addText('Vertical position top relative to line');
		$section->addImage(
				base_url('resources/_mars.jpg'),
				array(
						'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(3),
						'height'           => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(3),
						'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE,
						'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_CENTER,
						'posHorizontalRel' => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_COLUMN,
						'posVertical'      => \PhpOffice\PhpWord\Style\Image::POSITION_VERTICAL_TOP,
						'posVerticalRel'   => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_LINE,
				)
		);
		// Set writers
		$writers = array('Word2007' => 'docx');
		// Save file
		echo $this->writing($phpWord, basename(__FILE__, '.php'), $writers);
		// if (!CLI) {
		// 		include_once 'Sample_Footer.php';
		// }
		$this->load->view('welcome_message');
	}

	public function writing($phpWord, $filename, $writers)
	{
			$result = '';

			// Write documents
			foreach ($writers as $format => $extension) {
					$result .= date('H:i:s') . " Write to {$format} format";
					if (null !== $extension) {

							$targetFile = FCPATH.('resources/'.$filename.'.'.$extension); //base_url('/results/'.{$filename}.{$extension}'
							$download = base_url('resources/'.$filename.'.'.$extension);
							// // $file = 'HelloWorld.docx';
	            // header("Content-Description: File Transfer");
	            // header('Content-Disposition: attachment; filename="' . $targetFile . '"');
	            // header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	            // header('Content-Transfer-Encoding: binary');
	            // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	            // header('Expires: 0');
	            // // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	            // $phpWord->save("php://output", $format);
							$phpWord->save($targetFile, $format);
							echo "<a href=\"".$download."\">download</a>";
					} else {
							$result .= ' ... NOT DONE!';
					}
					// $result .= EOL;
			}

			// $result .= getEndingNotes($writers);

			return $result;
	}
}
