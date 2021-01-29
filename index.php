<?php
////This is my CONTROLLER
//
////Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//
////Require the autoload file
//require_once('vendor/autoload.php');
//
////Create an instance of the Base class
//$f3 = Base::instance();
//$f3->set('DEBUG', 3);
//
////Define a default route (home page)
//$f3->route('GET /', function() {
//    //echo "Dating Home";
//    $view = new Template();
//    echo $view->render('328/dating/views/home.html');
//});
//
////Run fat free
//$f3->run();


//This is my CONTROLLER

//Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//Define a default route (home page)
$f3->route('GET /', function () {
    //  echo "Pet Home"; //(home page, no index.php, go to directory)
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run fat free
$f3->run();
