<?php

use App\HTMLParser;

require __DIR__ . '/vendor/autoload.php';

$url = $argv[1] ?? '';
if (!$url) {
    echo 'no url' . PHP_EOL;
    exit;
}

$htmlParser = new HTMLParser($url);

$htmlParser->setContent();
$result = $htmlParser->getTags();

print_r($result);
