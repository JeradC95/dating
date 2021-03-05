<?php

class Controller{
    private $_f3;

    function __construct($_f3){
        $this->_f3 = $_f3;
    }

    function getIndoorInterests(){
        return array("tv", "gaming", "movies", "cooking", "reading", "art");
    }

    function getOutdoorInterests(){
        return array("cycling", "hiking", "camping", "animals", "swimming", "running");
    }

    function getGender(){
        return array("male", "female");
    }

    function getState()
    {
        return array("Washington", "Oregon", "California");
    }


    /* display home page */
    function home(){
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /*display info.html*/
    function info(){


        $view = new Template();
        echo $view->render('views/info.html');

    }

    /*display profile.html*/
    function profile(){

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['last-name']);
            $phonenumber = trim($_POST['phonenumber']);
            $age = trim($_POST['age']);
            $email = trim($_POST['email']);

            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['phonenumber'] = $phonenumber;
            $_SESSION['age'] = $age;
            $_SESSION['email'] = $email;

            if (isset($_POST["gender"])) {
                $gen = $_POST["gender"];
                $_SESSION["gender"] = $gen;
                $this->_f3->reroute("/profile");

            }
        }

        $this->_f3->set("gender", $this->getGender());
        $this->_f3->set("firstname",isset($firstname) ? $firstname : "");
        $this->_f3->set("lastname",isset($lastname) ? $lastname : "");
        $this->_f3->set("phonenumber",isset($phonenumber) ? $phonenumber : "");
        $this->_f3->set("age",isset($age) ? $age : "");

        $this->_f3->set("gender",isset($gender) ? $gender : "");


        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $email = trim($_POST['email']);
        }

        $this->_f3->set("email",isset($email) ? $email : "");
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    /*display interests.html*/
    function interests(){
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
    }

    function summary(){
        $view = new Template();
        echo $view->render('views/summary.html');
    }



}

