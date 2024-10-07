<?php

include_once 'pdf2text.php';

$pdf = 'Lorem_ipsum.pdf';
$pdf2text = new \Pdf2text\Pdf2text($pdf);
$output = $pdf2text->decode();
var_dump($output);
