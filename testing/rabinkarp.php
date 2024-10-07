<?php


function rabinKarp($text, $pattern, $prime = 101)
{
    $n = strlen($text);       // Panjang teks
    $m = strlen($pattern);    // Panjang pola
    $patternHash = 0;         // Nilai hash untuk pola
    $textHash = 0;            // Nilai hash untuk substring dari teks
    $h = 1;                   // Faktor pangkat untuk perhitungan hash
    $d = 256;                 // Basis untuk perhitungan hash (jumlah karakter dalam alfabet)

    // Hitung nilai h (d^(m-1)) % prime
    for ($i = 0; $i < $m - 1; $i++) {
        $h = ($h * $d) % $prime;
    }

    // Hitung nilai hash awal untuk pola dan substring pertama dari teks
    for ($i = 0; $i < $m; $i++) {
        $patternHash = ($d * $patternHash + ord($pattern[$i])) % $prime;
        $textHash = ($d * $textHash + ord($text[$i])) % $prime;
    }

    // Geser pola di sepanjang teks
    for ($i = 0; $i <= $n - $m; $i++) {
        // Periksa jika nilai hash cocok
        if ($patternHash == $textHash) {
            // Periksa karakter satu per satu untuk memastikan kecocokan
            for ($j = 0; $j < $m; $j++) {
                if ($text[$i + $j] != $pattern[$j]) {
                    break;
                }
            }

            // Jika semua karakter cocok
            if ($j == $m) {
                echo "Pola ditemukan pada indeks " . $i . "\n";
            }
        }

        // Hitung nilai hash untuk substring berikutnya
        if ($i < $n - $m) {
            $textHash = ($d * ($textHash - ord($text[$i]) * $h) + ord($text[$i + $m])) % $prime;

            // Jika nilai hash negatif, tambahkan prime agar tetap positif
            if ($textHash < 0) {
                $textHash = ($textHash + $prime);
            }
        }
    }
}

// Contoh penggunaan
$text = "Ini adalah contoh teks untuk pencarian pola";
$pattern = "pola pencarian";
rabinKarp($text, $pattern);
