<?php
// Satoko Random Logo Script

// Set this variable to true to make the script print out a URI instread, shouldn't be needed.
$printURI = false;

// Put images in the same folder as this script and this script will print out a random filename including the full URI to it.

$images = glob('*.{gif,jpg,jpeg,png}', GLOB_BRACE); // Get image with specified extensions from the same folder

// Assign a random value from the generated array to a variable
$image = $images[array_rand($images)];

if($printURI) {
    // Print out a properly formatted URI
    print (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['SERVER_NAME'] . str_replace(basename(__FILE__), null, $_SERVER['PHP_SELF']) . $image;
} else {
    // Set proper file header
    header('Content-Type: ' . finfo_file(finfo_open(FILEINFO_MIME_TYPE), $image));
    // Print out contents of the image
    print file_get_contents($image);
}
