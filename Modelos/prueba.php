<?php
phpinfo();
// Definir la función de transferencia
$num = array(1, 0, -2);
$den = array(1, 7, 10);
$tf = array(
    "num" => $num,
    "den" => $den
);

// Calcular los polos y ceros
$zeros = array(0, 2);
$poles = array(-5, -2);

// Crear una imagen de 400x400 píxeles
$image = imagecreate(400, 400);

// Establecer el color de fondo a blanco
$bg_color = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bg_color);

// Establecer los colores de los polos y ceros
$zero_color = imagecolorallocate($image, 0, 0, 255);
$pole_color = imagecolorallocate($image, 255, 0, 0);

// Establecer el tamaño de los polos y ceros
$zero_size = 8;
$pole_size = 10;

// Dibujar los polos y ceros en la imagen
foreach ($zeros as $z) {
    $x = 200 + 50 * $z;
    $y = 200;
    imagefilledellipse($image, $x, $y, $zero_size, $zero_size, $zero_color);
}
foreach ($poles as $p) {
    $x = 200 + 50 * $p;
    $y = 200;
    imagefilledrectangle($image, $x - $pole_size / 2, $y - $pole_size / 2, $x + $pole_size / 2, $y + $pole_size / 2, $pole_color);
}

// Mostrar la imagen en el navegador
header('Content-Type: image/png');
imagepng($image);

// Liberar la memoria utilizada por la imagen
imagedestroy($image);

?>
