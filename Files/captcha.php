<?php 
header('Content-type: image/jpeg');
$img = "bg.jpg";
$im = imagecreatefromjpeg($img);
$black = imagecolorallocate($im, 0, 0, 0);
$red = imagecolorallocate($im, 255, 0, 0);
$font_path = 'abir.ttf';

			$text1 = $_GET['code'];
			$font_size=40;
			$p = imagettfbbox($font_size, 0, $font_path, $text1);
			$txt_width = $p[2] - $p[0];
			$x = (200 - $txt_width) / 2;
			imagettftext($im, $font_size, 0, $x, 45, $black, $font_path, "$text1");

      imagejpeg($im);
      imagedestroy($im);
 ?>