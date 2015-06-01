<?php namespace App\Library;

use Illuminate\Database\Eloquent\Model;

class MYPDF extends \TCPDF{
	public function Header() {
		$this->setJPEGQuality(90);
		$this->Image(asset('front/images/logo.png'), 120, 10, 75, 0, 'PNG');

	}
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont(PDF_FONT_NAME_MAIN, 'I', 8);
		$this->Cell(0, 10, \Lang::get('purchase.invoice_slogan'), 0, false, 'C');
	}
	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$this->Cell($width, $height, $textval, 0, false, $align);
	}
}
