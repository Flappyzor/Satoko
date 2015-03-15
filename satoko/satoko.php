<?php
// Require core PHP files
require_once 'libraries/Satoko.php';

// Start board
print Satoko\Board::$_TPL->render('index.tmpl', $renderData);
