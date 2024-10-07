<?php

// Fungsi untuk menghitung Levenshtein Distance antara dua string
function levenshteinDistance($str1, $str2)
{
    $lenStr1 = strlen($str1);
    $lenStr2 = strlen($str2);

    // Membuat matriks
    $matrix = [];

    // Inisialisasi baris dan kolom pertama dari matriks
    for ($i = 0; $i <= $lenStr1; $i++) {
        $matrix[$i][0] = $i;
    }

    for ($j = 0; $j <= $lenStr2; $j++) {
        $matrix[0][$j] = $j;
    }

    // Mengisi matriks
    for ($i = 1; $i <= $lenStr1; $i++) {
        for ($j = 1; $j <= $lenStr2; $j++) {
            $cost = ($str1[$i - 1] == $str2[$j - 1]) ? 0 : 1;
            $matrix[$i][$j] = min(
                $matrix[$i - 1][$j] + 1,    // Penghapusan
                $matrix[$i][$j - 1] + 1,    // Penyisipan
                $matrix[$i - 1][$j - 1] + $cost // Substitusi
            );
        }
    }

    return $matrix[$lenStr1][$lenStr2];
}

// Contoh penggunaan fungsi levenshteinDistance
$str1 = "Analisis Pengaruh Sosial Media Terhadap Prestasi Akademik pada universitas khairun ternate";
$str2 = "Menganalisa Pengaruh Sosial Media Terhadap Prestasi Akademik pada akademi ilmu komputer ternate";

$distance = levenshteinDistance($str1, $str2);


echo "Levenshtein Distance antara '$str1' dan '$str2' adalah: " . $distance . "\n";
echo strlen($str1);
echo "\n";
echo strlen($str2);
echo "\n";
echo "\n";

if ($distance >= (strlen($str1) / 2)) {
    echo "tidak mirip";
} else {
    echo "masih ada kemiripan";
}
echo "\n";
echo "\n";
