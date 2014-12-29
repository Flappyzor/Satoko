<?php
// Require core PHP files
require_once 'lib/Satoko.php';

// Initialise Board
$board = new Satoko\Board($satoko);

// Set Board Identifier
$board->setBoard($board->getConfig('board'));

// Start board
if($board->getConfig('liveEnable')) { // Live mode
	//print 'TODO: Make live mode.';
	print $board->_TEMPL->temp_output('header');
	print $board->_TEMPL->temp_output('footer');
} else { // Static mode
	print 'not live';
}
