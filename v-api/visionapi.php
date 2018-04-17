<?php
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
require dirname(__DIR__) . '/vendor/autoload.php';
# Imports the Google Cloud client library
use Google\Cloud\Vision\VisionClient;
# Your Google Cloud Platform project ID
putenv("GOOGLE_APPLICATION_CREDENTIALS=key.json");
$projectId = 'logical-seat-196609';
# Instantiates a client
$vision = new VisionClient([
    'projectId' => $projectId
]);
# The name of the image file to annotate
$fileName = 'happy.jpg';
# Prepare the image to be annotated
$image = $vision->image(fopen($fileName, 'r'), [
    'LABEL_DETECTION'
]);
# Performs label detection on the image file
$labels = $vision->annotate($image)->labels();
echo "Labels:\n";
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
    foreach ($labels as $label) {
    echo $label->description() . "\n";
}
# [END vision_quickstart]
return $labels;
