<?php
// Satoko Configuration
$satoko = array(); // Define configuration array

// PDO Database Connection
$satoko['db']               = array();
$satoko['db']['driver']     = 'mysql'; // SQL Driver in the libraries/database folder
$satoko['db']['unixsocket'] = false; // Use Unix Socket?
$satoko['db']['host']       = 'localhost'; // SQL Database host
$satoko['db']['port']       = 3306; // SQL Port
$satoko['db']['username']   = 'root'; // SQL Username
$satoko['db']['password']   = ''; // SQL Password
$satoko['db']['database']   = 'satoko'; // SQL Database
$satoko['db']['prefix']     = 'satoko_'; // SQL Table Prefix

// Meta
$satoko['board']            = 'sib'; // Set Unique Identifier for this board.
$satoko['charset']          = 'utf-8'; // Set Character set used for the generated pages by the board.
$satoko['indexFile']        = 'index.html'; // Filename of the board index (index.html by default).
$satoko['catalogFile']      = 'catalog.html'; // Filename for Catalog set to null to disable.
$satoko['exposeErrors']     = true; // Display PHP errors, set this to false if everything's working OK.
$satoko['types']            = array(); // Allowed filetypes => mimetypes. Set mimetype to null to ignore, not recommended to use EVER. If you want multiple mimetypes make the mimetype bit an array.
$satoko['threadFolder']     = 'res'; // Folder thread HTML files will be saved to.
$satoko['imageFolder']      = 'src'; // Folder Images will be saved to.
$satoko['thumbFolder']      = 'thumb'; // Folder thumbnails will be saved to.
$satoko['enableSpoiler']    = true; // Enable image spoilering.
$satoko['spoilerImg']       = 'spoiler.png'; // Link to spoiler image.
$satoko['language']         = 'en-gb'; // The language strings file that should be used by the board in the libraries/language folder

// Board Header
$satoko['boardTitle']       = 'Satoko Image Board'; // Title displayed on the header of the board. (If you want the "/b/ - Random" style board names set this to "'/' . $satoko['board'] . '/ - Board Name';" without double quotes)
$satoko['boardSubtitle']    = 'Something that isn\'t (absolute) garbage.'; // Text displayed below the title of the board.
$satoko['boardDescription'] = 'Describe your niche here'; // Description read by search engines etc.
$satoko['boardDisclaimer']  = 'All trademarks and copyrights on this page are owned by their respective parties. Images uploaded are the responsibility of the Poster. Comments are owned by the Poster.'; // General disclaimer displayed in the footer of the board.
$satoko['boardImage']       = 'logo/image.php'; // Set URL to board header. Script for randomising board header image is included in the logo folder, if you don't want to use this feature you can delete the logo folder.
$satoko['boardList']        = 'configuration/boardlist.json'; // JSON file containing boardlinks for the header, if wanted you can make this an array instead and Satoko will detect and adjust to it.
$satoko['boardRules']       = 'configuration/rules.json'; // The same as the variable above except with rules.

// Templates
$satoko['tplFolder']        = 'templates'; // Local folder path to templates folder.
$satoko['tplName']          = 'imageboard'; // Name of template you want to use.
$satoko['cacheFolder']      = 'cache'; // Local folder path to cache folder.

// Generation Settings
$satoko['pageCount']            = 10; // The amount of pages generated.
$satoko['startPageCountAt']     = 0; // Number to start page count from.
$satoko['postsPerPage']         = 15; // The amount of threads per page.
$satoko['threadPreviewPosts']   = 3; // The amount of posts that should be "previewed" on the pages (excluding the OP).
$satoko['imageLimit']           = 0; // Amount of images allowed in one thread. 0 disables this feature.
$satoko['ageLimit']             = 1800; // The age of a thread (in seconds) before posting gets disabled.
$satoko['maxWidth']             = 300; // Maximum image width before thumbnailing happens.
$satoko['maxHeight']            = 300; // Same as described above but with height.
