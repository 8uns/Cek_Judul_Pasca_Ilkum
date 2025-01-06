<?php
require "pdfcrowd.php";

try {
    // Create an API client instance.
    $client = new \Pdfcrowd\PdfToTextClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

    // Run the conversion and save the result to a file.
    $client->convertFileToFile("dnsserver.pdf", "dnsserver.txt");
} catch (\Pdfcrowd\Error $why) {
    error_log("Pdfcrowd Error: {$why}\n");
    throw $why;
}
