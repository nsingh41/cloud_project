<?php
include('dbtest.php');
/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
# [START vision_quickstart]
# Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';
# Imports the Google Cloud client library
use Google\Cloud\Vision\VisionClient;
use Google\Cloud\Storage\StorageClient;
# Your Google Cloud Platform project ID
putenv("GOOGLE_APPLICATION_CREDENTIALS=key.json");
 $storage = new StorageClient();
 $bucketName = 'my-bucket-sansoa';
 $objectName = 'black.jpg';
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->object($objectName);
    $info = $object->info();


// $fileContents = file_get_contents($objectName);

echo "<pre>";print_r($info);
 echo '<img src=' . PHP_EOL, $info['mediaLink'] .'>';

// $image = file_get_contents("https://storage.cloud.google.com//shiva.jpg");
// echo $image;
?>