<?php
# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';
putenv("GOOGLE_APPLICATION_CREDENTIALS=key.json");

# Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;
$filename = $_FILES["file"]["name"];
$filePath = $_FILES["file"]["tmp_name"];
// echo $file;die;

# Your Google Cloud Platform project ID
$bucketName = 'my-bucket-sansoa';
// $filePath = 'course07.jpg';
$objectName = $filename;
$storage = new StorageClient();

$bucket = $storage->bucket($bucketName); // Put your bucket name here.

$object = $bucket->upload(file_get_contents($filePath), [
    'name' => $objectName
]);



?>