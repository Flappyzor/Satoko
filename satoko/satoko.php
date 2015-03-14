<?php
// Require core PHP files
require_once 'libraries/Satoko.php';

// Initialise Board
$board = new Satoko\Board($satoko);

// Initialise templating engine
$board->initTwig();

// Set Board Identifier
$board->setBoard($board->getConfig('board'));

// Start board
/*
 Don't need this right now
if($board->getConfig('liveEnable')) { // Live mode
    print 'TODO: Make live mode.';
} else { // Static mode
    print 'not live';
}*/

print $board->_TPL->render('index.tpl',
    array(
        'board' => array(
            'boardList' => $board->getJSONArray($board::getConfig('boardList')),
            'stylesheets' => $board->getStylesheets(),
            'stylesPath' => $board::getConfig('tplFolder') .'/'. $board::getConfig('tplName') .'/styles/',
            'rules' => $board->getJSONArray($board::getConfig('boardRules')),
            'version' => SATOKO_VERSION
        ),
        'configuration' => $satoko,
        'server' => $_SERVER,
        'lang' => $language
    )
);
