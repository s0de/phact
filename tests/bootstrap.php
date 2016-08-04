<?php

// ensure we get report on all possible php errors
error_reporting(-1);

$_SERVER['SCRIPT_NAME'] = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

// require composer autoloader if available
$composerAutoload = __DIR__ . '/../vendor/autoload.php';
require_once($composerAutoload);
require_once(__DIR__ . '/Templates/TestCase.php');
require_once(__DIR__ . '/Templates/AppTest.php');
require_once(__DIR__ . '/Templates/DatabaseTest.php');

function req($classes)
{
    foreach ($classes as $class) {
        require_once($class);
    }
}
req(glob(__DIR__ . '/sandbox/app/Modules/Test/*Module.php'));
req(glob(__DIR__ . '/sandbox/app/Modules/Test/**/*.php'));