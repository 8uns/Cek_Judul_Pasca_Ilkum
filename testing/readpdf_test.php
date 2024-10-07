<?php

function pdfToText($filename)
{
    // Buka file PDF
    $file = fopen($filename, 'rb');
    if (!$file) {
        return false;
    }

    $content = '';
    // Baca file PDF byte demi byte
    while (!feof($file)) {
        $content .= fread($file, 8192);
    }

    fclose($file);

    // Ekstrak teks dari file PDF menggunakan regex dasar
    $pattern = "/BT[\s\S]+?ET/";
    preg_match_all($pattern, $content, $matches);

    $text = '';
    foreach ($matches[0] as $match) {
        // Hilangkan karakter yang tidak diperlukan dari hasil ekstraksi teks
        $match = preg_replace('/\s+/', ' ', $match);  // Hilangkan spasi ekstra
        $match = preg_replace('/[^(\x20-\x7E)]*/', '', $match);  // Hilangkan karakter non-printable
        $text .= $match . "\n";
    }

    return $text;
}

$pdfText = pdfToText('Lorem_ipsum.pdf');
var_dump($pdfText);
if ($pdfText) {
    file_put_contents('output.txt', $pdfText);

    echo "Teks dari PDF telah diekstrak dan disimpan di output.txt";
} else {
    echo "gagal diekstrak";
}
