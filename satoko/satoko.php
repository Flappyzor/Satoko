 beginnWhere<?php
// Require core PHP files
require_once 'libraries/Satoko.php';

// Initialise Board
$board = new Satoko\Board($satoko);

// Set Board Identifier
$board->setBoard($board->getConfig('board'));

// Start board
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
