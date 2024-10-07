<?php

include 'pdfparser-master/alt_autoload.php';

// Parse PDF file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();

// $pdf = $parser->parseFile('Lorem_ipsum.pdf');
// .. or ...
$pdf = $parser->parseContent(file_get_contents('penelitian/Ind_ Analisis Perbandingan Akurasi dan Waktu Proses Algoritma Stemming Arifin-Setiono dan Nazief-Adriani Pada Dokumen Teks Bahasa Indonesia.pdf'));

$text = $pdf->getText();

// var_dump($text);

echo strtolower($text);
