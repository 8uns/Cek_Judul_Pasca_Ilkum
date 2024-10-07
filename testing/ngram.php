<?php

function generate_ngrams($text, $n)
{
    $tokens = explode(' ', $text);
    $ngrams = array();

    for ($i = 0; $i < count($tokens) - $n + 1; $i++) {
        $ngram = implode(' ', array_slice($tokens, $i, $n));
        $ngrams[] = $ngram;
    }

    return $ngrams;
}

function ngram_similarity($title1, $title2, $n)
{
    $ngrams1 = generate_ngrams($title1, $n);
    $ngrams2 = generate_ngrams($title2, $n);

    $intersection = array_intersect($ngrams1, $ngrams2);
    $union = array_unique(array_merge($ngrams1, $ngrams2));

    return count($intersection) / count($union);
}

$title1 = "Analisis Pengaruh Sosial Media Terhadap Prestasi Akademik pada universitas khairun ternate";
$title2 = "Menganalisa Pengaruh Sosial Media Terhadap Prestasi Akademik pada akademi ilmu komputer ternate";

$n = 2; // 2-gram (bigram)

$similarity = ngram_similarity($title1, $title2, $n);

echo "Kesamaan antara judul: " . $similarity;
