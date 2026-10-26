<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Captcha extends Controller
{
    public function generar()
    {
		 helper('text');

		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Pragma: no-cache");
		header('Content-Type: image/png');

		$width = 180;
		$height = 60;

		$image = imagecreatetruecolor($width, $height);

		// Colores elegantes
		$bgColor = imagecolorallocate($image, 245, 250, 255);   // fondo muy claro
		$textColor = imagecolorallocate($image, 0, 51, 102);     // azul oscuro
		$lineColor = imagecolorallocate($image, 200, 220, 235);  // líneas suaves

		imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

		// Líneas de ruido
		for ($i = 0; $i < 5; $i++) {
			imageline($image, rand(0, $width), rand(0, $height),
				rand(0, $width), rand(0, $height), $lineColor);
		}

		// Texto del CAPTCHA
		$captcha = strtoupper(random_string('alpha', 5)); // 5 letras
		session()->set('captcha_code', $captcha);

		$fontPath = FCPATH . 'fonts/OpenSans-Light-webfont.ttf'; // Asegúrate de tenerla
		$fontSize = 20;
		$x = 15;

		for ($i = 0; $i < strlen($captcha); $i++) {
			$angle = rand(-15, 15);
			$y = rand(35, 45);
			imagettftext($image, $fontSize, $angle, $x, $y, $textColor, $fontPath, $captcha[$i]);
			$x += 30;
		}

		imagepng($image);
		imagedestroy($image);
    }
}
