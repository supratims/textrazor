<?php

require_once('TextRazor.php');

$text = 'Barclays misled shareholders and the public about one of the biggest investments in the banks history, a BBC Panorama investigation has found.';

$YOUR_API_KEY
$keys = parse_ini_file(__DIR__ . '/app.keys');
$api_key = $keys['api.key'];
$textrazor = new TextRazor($api_key);

$textrazor->addExtractor('entities');

$response = $textrazor->analyze($text);
if (isset($response['response']['entities'])) {
    foreach ($response['response']['entities'] as $entity) {
        print($entity['entityId']);
        print(PHP_EOL);
    }
}