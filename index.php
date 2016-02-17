<?php

require_once('vendor/autoload.php');

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

$client = S3Client::factory([
    'credentials' => [
        'key'    => 'YOUR_KEY',
        'secret' => 'YOUR_SECRET_KEY',
    ],
    'region' => 'REGION',
    'version' => 'version/latest',
]);

$adapter = new AwsS3Adapter($client, 'bucket');

$fs = new Filesystem($adapter);

$content = $fs->listContents('/');

print_r($content);
