<?php
// Require core PHP files
require_once 'libraries/Satoko.php';

// Start board
print $board->_TPL->render('index.tpl', $renderData);
