<?php

//Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start Session
session_start();


//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

$f3->set('DEBUG', 3);


//Define a default route (home page)
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define info route (info.html)
$f3 -> route('GET /info', function(){

    $view = new Template();
    echo $view->render('views/info.html');
});

//Define profile route (profile.html)
$f3->route('POST /profile', function (){

    $firstname = $_POST['firstname'];
    if(!empty($firstname)){
        $_SESSION['firstname'] = $firstname;
    }

    $lastname = $_POST['lastname'];
    if(!empty($firstname)){
        $_SESSION['lastname'] = $lastname;
    }

    $age = $_POST['age'];
    if(!empty($age)){
        $_SESSION['age'] = $age;
    }

    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
        $_SESSION['gender'] = $gender;
    }

    $phonenumber = $_POST['phonenumber'];
    if(!empty($phonenumber)){
        $_SESSION['phonenumber'] = $phonenumber;
    }

   $view = new Template();
   echo $view->render('views/profile.html');
});

//Define interests route (interests.html)
$f3->route('POST /interests', function (){

    $email = $_POST['email'];
    if(!empty($email)){
        $_SESSION['email'] = $email;
    }

    $state = $_POST['state'];
    if(!empty($state)){
        $_SESSION['state'] = $state;
    }

    if(isset($_POST['seeking'])){
        $seeking = $_POST['seeking'];
        $_SESSION['seeking'] = $seeking;
    }

    $view = new Template();
    echo $view->render('views/interests.html');
});

//Define default summary route (sumamry.html)
$f3->route('POST /summary', function (){
    $view = new Template();
    echo $view->render('views/summary.html');
});




//Run fat free
$f3->run();
