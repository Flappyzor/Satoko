<?php
// Satoko Random Logo Script

// Set this variable to true to make the script print out a URI instread, shouldn't be needed.
$printURI = false;

// Put images in the same folder as this script and this script will print out a random filename including the full URI to it.

$images		= array();								// Define array on $images to "store" images in
$imageTypes	= array('gif', 'jpg', 'jpeg', 'png');	// Define allowed file formats

foreach(glob('*.*') as $data) { // Run foreach to check if data in folder is actually images
	if(in_array(str_replace('.', '', strstr($data, '.')), $imageTypes)) {
		$images[] = $data; // Add images to array
	}
}

// Assign a random value from the generated array to a variable
$image = $images[array_rand($images)];

if($printURI) {
	// Print out a properly formatted URI
	print (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['SERVER_NAME'] . str_replace(basename(__FILE__), null, $_SERVER['PHP_SELF']) . $image;
} else {
	// Set proper file header
	header('Content-Type: ' . mime_content_type($image));
	// Print out contents of the image
	print file_get_contents($image);
}
