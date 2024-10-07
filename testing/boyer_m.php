<?php

function buildLastTable($pattern)
{
    $len = strlen($pattern);
    $last = array_fill(0, 256, -1); // Array untuk menyimpan posisi terakhir dari karakter dalam pola

    for ($i = 0; $i < $len; $i++) {
        $last[ord($pattern[$i])] = $i;
    }

    return $last;
}

function boyerMoore($text, $pattern)
{
    $n = strlen($text);
    $m = strlen($pattern);

    if ($m == 0 || $n == 0) {
        return -1; // Jika pola atau teks kosong, tidak ada yang bisa dicari
    }

    $last = buildLastTable($pattern);
    $skip = 0;

    for ($i = 0; $i <= $n - $m; $i += $skip) {
        $skip = 0;
        for ($j = $m - 1; $j >= 0; $j--) {
            if ($pattern[$j] != $text[$i + $j]) {
                $skip = max(1, $j - $last[ord($text[$i + $j])]);
                break;
            }
        }

        if ($skip == 0) {
            return $i; // Pola ditemukan pada posisi $i
        }
    }

    return -1; // Pola tidak ditemukan
}

// Contoh penggunaan
$text = "this is a simple example";
$pattern = " simple example das";
$result = boyerMoore($text, $pattern);

if ($result != -1) {
    echo "Pattern found at position: " . $result . "\n";
} else {
    echo "Pattern not found\n";
}
