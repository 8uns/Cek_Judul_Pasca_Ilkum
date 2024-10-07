<?php

// Fungsi untuk menghitung Cosine Similarity antara dua vektor
function cosineSimilarity($vec1, $vec2)
{
    $dotProduct = 0;
    $normVec1 = 0;
    $normVec2 = 0;

    foreach ($vec1 as $key => $value) {
        if (isset($vec2[$key])) {
            $dotProduct += $value * $vec2[$key];
        }
        $normVec1 += $value * $value;
    }

    foreach ($vec2 as $key => $value) {
        $normVec2 += $value * $value;
    }

    if ($normVec1 == 0 || $normVec2 == 0) {
        return 0;
    }

    return $dotProduct / (sqrt($normVec1) * sqrt($normVec2));
}

// Contoh penggunaan fungsi cosineSimilarity
$vector1 = [
    'a' => 1,
    'b' => 2,
    'c' => 3
];

$vector2 = [
    'a' => 1,
    'b' => 5,
    'c' => 4
];

$similarity = cosineSimilarity($vector1, $vector2);

echo "Cosine Similarity: " . $similarity . "\n";
