<?php

function upload()
{
    $fileName = $_FILES['skinimage']['name'];
    $fileType = $_FILES['skinimage']['type'];
    $fileSize = $_FILES['skinimage']['size'];
    $fileError = $_FILES['skinimage']['error'];
    $fileTmp = $_FILES['skinimage']['tmp_name'];

    if ($fileError === 4) {
        echo "<script>
            alert('Upload gambar terlebih dahulu');
        </script>";
        return false;
    }

    $fileExt = explode('.', $fileName);
    $fileExt = strtolower(end($fileExt));
    if ($fileExt != 'png') {
        echo "<script>
            alert('Gambar harus berformat png');
        </script>";
        return false;
    }


    if ($fileType !== 'image/png') {
        echo "<script>
            alert('Gambar harus berformat png');
        </script>";
        return false;
    }

    if ($fileSize > 5000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    move_uploaded_file($fileTmp, 'skin.png');
    return true;
}

if (isset($_POST['buatskin'])) {
    $img = upload();
    if (!$img) {
        echo "<script>
            window.location.href = '/sanssmp';
        </script>";
        die;
    }

    $template = 'sanssmpl.png';
    $skin = 'skin.png';

    $format = GetImageSize($skin);
    $im = imagecreatefrompng($skin);

    $im2 = imagecreatefrompng($template);

    imagecopy($im, $im2, 0, 0, 0, 0, imagesx($im2), imagesy($im2));

    imagesavealpha($im, true);
    imagepng($im, "result.png");
    imagedestroy($im);
    imagedestroy($im2);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="hasil.png"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('result.png'));
    readfile('result.png');
}
