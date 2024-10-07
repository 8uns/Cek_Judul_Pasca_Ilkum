<?php

class Search_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // LEVENSHTEIN DISTANCE
    function levenshteinDistance($str1, $str2)
    {
        $str1 = strtoupper($str1);
        $str2 = strtoupper($str2);
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


    // BOYER MOORE 
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
        $text = strtoupper($text);
        $pattern = strtoupper($pattern);
        $n = strlen($text);
        $m = strlen($pattern);

        if ($m == 0 || $n == 0) {
            return -1; // Jika pola atau teks kosong, tidak ada yang bisa dicari
        }

        $last = $this->buildLastTable($pattern);
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
}
