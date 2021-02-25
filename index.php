<?php

//Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start Session
session_start();


//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/validation.php');
require_once ('model/data-layer.php');

//Create an instance of the Base class
$f3 = Base::instance();

$f3->set('DEBUG', 3);


//Define a default route (home page)
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define info route (info.html)
$f3 -> route('GET|POST /info', function(){

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['last-name']);
        $phonenumber = trim($_POST['phonenumber']);
        $age = trim($_POST['age']);

    }



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

    $bio = $_POST['bio'];
    if(!empty($bio)){
        $_SESSION['bio'] = $bio;
    }

    $view = new Template();
    echo $view->render('views/interests.html');
});

//Define default summary route (sumamry.html)
$f3->route('POST /summary', function (){

    if(isset($_POST['interest1'])){
        $interest1 = $_POST['interest1'];
        $_SESSION['interest1'] = $interest1;
    }

    if(isset($_POST['interest2'])){
        $interest2 = $_POST['interest2'];
        $_SESSION['interest2'] = $interest2;
    }

    if(isset($_POST['interest3'])){
        $interest3 = $_POST['interest3'];
        $_SESSION['interest3'] = $interest3;
    }

    if(isset($_POST['interest4'])){
        $interest4 = $_POST['interest4'];
        $_SESSION['interest4'] = $interest4;
    }

    if(isset($_POST['interest5'])){
        $interest5 = $_POST['interest5'];
        $_SESSION['interest5'] = $interest5;
    }

    if(isset($_POST['interest6'])){
        $interest6 = $_POST['interest6'];
        $_SESSION['interest6'] = $interest6;
    }

    if(isset($_POST['interest7'])){
        $interest7 = $_POST['interest7'];
        $_SESSION['interest7'] = $interest7;
    }

    if(isset($_POST['interest8'])){
        $interest8 = $_POST['interest8'];
        $_SESSION['interest8'] = $interest8;
    }

    if(isset($_POST['interest9'])){
        $interest9 = $_POST['interest9'];
        $_SESSION['interest9'] = $interest9;
    }

    if(isset($_POST['interest10'])){
        $interest10 = $_POST['interest10'];
        $_SESSION['interest10'] = $interest10;
    }

    if(isset($_POST['interest11'])){
        $interest11 = $_POST['interest11'];
        $_SESSION['interest11'] = $interest11;
    }

    if(isset($_POST['interest12'])){
        $interest12 = $_POST['interest12'];
        $_SESSION['interest12'] = $interest12;
    }



    $view = new Template();
    echo $view->render('views/summary.html');
});




//Run fat free
$f3->run();
