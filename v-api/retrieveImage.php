<?php


use google\appengine\api\cloud_storage\CloudStorageTools;


# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';
putenv("GOOGLE_APPLICATION_CREDENTIALS=key.json");

# Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;
$storage = new StorageClient();
$bucketName = 'my-bucket-sansoa';
$root_path = 'gs://' . $bucketName . '/'; 
$bucket = $storage->bucket($bucketName);
		$buckets = $storage->buckets([
    'prefix' => 'happy'
]);
$image_file = $root_path.'/image.jpg';
$image_url = CloudStorageTools::getImageServingUrl($image_file);
echo $image_url;
foreach ($buckets as $bucket) {
    echo $bucket->name() . PHP_EOL;
}
?>