<?php

if (isset($_POST['buatskin'])) {
    var_dump($_POST);
    var_dump($_FILES);
}

// $template = 'sanssmpl.png';
// $skin = 'myskin.png';

// $format = GetImageSize($skin);

// if ($format[2] == 1) //gif
//     $im = imagecreatefromgif($skin);
// if ($format[2] == 2) //jpg
//     $im = imagecreatefromjpeg($skin);
// if ($format[2] == 3) //png
//     $im = imagecreatefrompng($skin);

// $im2 = imagecreatefrompng($template);

// imagecopy($im, $im2, 0, 0, 0, 0, imagesx($im2), imagesy($im2));

// imagesavealpha($im, true);
// imagepng($im, "result.png");
// imagedestroy($im);
// imagedestroy($im2);
