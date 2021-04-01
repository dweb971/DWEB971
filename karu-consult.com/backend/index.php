<?php 
ini_set('display_errors', 1);

// image locale
$trou = "img/trnoir.jpg";

// taille image locale
$size = getimagesize($trou);


$width = $size[0];
$heigth = $size[1];

// jpg ou jpeg
$im = @imagecreatefromjpeg($trou);  // ressource id image locale

// texte dans image

// Fond blanc et texte bleu
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 255);

// Ajout de la phrase en haut à gauche
imagestring($im, 5, 0, 0, 'Hello world!', $textcolor);

// Définit le contenu de l'en-tête - dans ce cas, image/jpeg
header('Content-Type: image/jpeg');

// Affichage de l'image
imagejpeg($im);




print_r($im);














?>