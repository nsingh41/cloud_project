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
# Your Google Cloud Platform project ID
putenv("GOOGLE_APPLICATION_CREDENTIALS=key.json");
$projectId = 'video-12-196103';
# Instantiates a client
$vision = new VisionClient([
    'projectId' => $projectId
]);
# The name of the image file to annotate
$fileName = 'course07.jpg';
# Prepare the image to be annotated
$image = $vision->image(fopen($fileName, 'r'), [
    'LABEL_DETECTION'
]);
# Performs label detection on the image file
$labels = $vision->annotate($image)->labels();
echo "Labels:\n";
$get_labels = "";
$count = count($labels);
$i=0;
foreach ($labels as $label) {
    $i++;
    $get_labels .= $label->description() ;
if($i!=$count){
    $get_labels .= ', ';
}
}
$save = 'insert into sample (image_path,image_labels) values("NULL","'.$get_labels.'")';
if($conn->query($save)===TRUE){
    echo "added!";
}
else{
    echo $conn->error;
}
echo $get_labels;
# [END vision_quickstart]
return $labels;
$fileName = 'course07.jpg';
$image = $vision->image($object, ['FACE_DETECTION']);
    $result = $vision->annotate($image);

    // print the response
    print("Faces:\n");
    foreach ((array) $result->faces() as $face) {
        printf("Anger: %s\n", $face->isAngry() ? 'yes' : 'no');
        printf("Joy: %s\n", $face->isJoyful() ? 'yes' : 'no');
        printf("Surprise: %s\n\n", $face->isSurprised() ? 'yes' : 'no');
    }
    
    return $result;
