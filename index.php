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
$f3 -> route('GET|POST /info', function($f3){

    if($_SERVER['REQUEST_METHOD']=='POST') {
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['last-name']);
        $phonenumber = trim($_POST['phonenumber']);
        $age = trim($_POST['age']);
        $email = trim($_POST['email']);

        if (validName($firstname)) {
            $_SESSION['firstname'] = $firstname;
        } else {
            $f3->Set("error['firstname']", "First name must not be empty");
        }

        if (validName($lastname)) {
            $_SESSION['lastname'] = $lastname;
        } else {
            $f3->Set("error['lastname']", "last name must not be empty");
        }

        if (validPhone($phonenumber)) {
            $_SESSION['phonenumber'] = $phonenumber;
        } else {
            $f3->Set("error['phonenumber']", "Phone number must not be empty");
        }

        if (validAge($age)) {
            $_SESSION['age'] = $age;
        } else {
            $f3->Set("error['age']", "Age must not be empty");
        }

        if (validEmail($email)) {
            $_SESSION['email'] = $email;
        } else {
            $f3->Set("error['email']", "Email must not be empty");
        }

        if (isset($_POST["gender"])) {
            $gen = $_POST["gender"];

            if (validGender($gen)) {
                $_SESSION["gender"] = $gen;
            } else {
                $f3->Set("error['gender']", "Gender must be selected");
            }

            if (empty($f3->get("error"))) {
                $f3->reroute("/profile.html");
            }
        }
    }

    $f3->set("gender", getGender());
    $f3->set("firstname",isset($firstname) ? $firstname : "");
    $f3->set("lastname",isset($lastname) ? $lastname : "");
    $f3->set("phonenumber",isset($phonenumber) ? $phonenumber : "");
    $f3->set("age",isset($age) ? $age : "");

    $f3->set("gender",isset($gender) ? $gender : "");


    $view = new Template();
    echo $view->render('views/info.html');
});

//Define profile route (profile.html)
$f3->route('POST /profile', function ($f3){


    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $email = trim($_POST['email']);
    }

    $f3->set("email",isset($email) ? $email : "");
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



    $view = new Template();
    echo $view->render('views/summary.html');
});




//Run fat free
$f3->run();
