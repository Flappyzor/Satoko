<?php
// Require core PHP files
require_once '.config.php';
require_once 'lib/satoko.php';

// Initialise Board
$board = new Satoko\Board($satoko);

// Set Board Identifier
$board->setBoard($board->getConfig('board'));

// Start board
if($board->getConfig('liveEnable')) { // Live mode
	print 'TODO: Make live mode.';
} else { // Static mode
	print 'not live';
}
