<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

// Start Session
session_start();

//Create an instance of the Base class
$f3 = Base::instance();
$validator = new DatingValidate();
$datalayer = new DatingDataLayer();
$controller = new DatingController($f3);

$f3->set('DEBUG', 3);


//Define a default route (home page)
$f3->route('GET /', function () {
    global $controller;
    $controller->home();
});

//Define info route (info.html)
$f3 -> route('GET|POST /info', function($f3){
    global $controller;
    $controller->info();

});

//Define profile route (profile.html)
$f3->route('GET|POST /profile', function ($f3){

    global $controller;
    $controller->profile();

});

//Define interests route (interests.html)
$f3->route('GET|POST /interests', function (){

   global $controller;
   $controller->interests();
});

//Define default summary route (summary.html)
$f3->route('GET|POST /summary', function (){

    global $controller;
    $controller->summary();
});




//Run fat free
$f3->run();
