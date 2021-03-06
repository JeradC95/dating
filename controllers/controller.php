<?php

class DatingController{
    private $_f3;

    function __construct($_f3){
        $this->_f3 = $_f3;
    }

    /* display home page */
    function home(){
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /*display info.html*/
    function info(){

        global $validator;
        global $datalayer;

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['last-name']);
            $phonenumber = trim($_POST['phonenumber']);
            $age = trim($_POST['age']);

            //create new member
            $member = new Member();

            //put new member in session array
            $_SESSION['member'] = $member;

            //using set method to set data on member obj
            if($validator->validName($firstname)){
                $_SESSION['member']->setFirstname($firstname);
            } else {
                $this->_f3->set('errors["firstname"]', "Name required");
            }


            $_SESSION['member']->setLastname($lastname);
            $_SESSION['member']->setPhonenumber($phonenumber);
            $_SESSION['member']->setAge($age);

            if (isset($_POST["gender"])) {
                $gen = $_POST["gender"];
                $_SESSION["member"]->setGender($gen);

            }
            if(empty($this->_f3->get("errors"))){
                $this->_f3->reroute("/profile");
            }
        }

        $this->_f3->set("gender", $datalayer->getGender());
        $this->_f3->set("firstname",isset($firstname) ? $firstname : "");
        $this->_f3->set("lastname",isset($lastname) ? $lastname : "");
        $this->_f3->set("phonenumber",isset($phonenumber) ? $phonenumber : "");
        $this->_f3->set("age",isset($age) ? $age : "");
        $this->_f3->set("gender",isset($gender) ? $gender : "");


        $view = new Template();
        echo $view->render('views/info.html');

    }

    /*display profile.html*/
    function profile(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){




        $email = $_POST['email'];

        if(!empty($email)){
            $_SESSION['member']->setEmail($email);
        } else {
            $this->_f3->set("errors['email']", "Email must be set");
        }

        $state = $_POST['state'];
        if(!empty($state)){
            $_SESSION['member']->setState($state);
        }

        if(isset($_POST['seeking'])){
            $seeking = $_POST['seeking'];
            $_SESSION['member']->setSeeking($seeking);
        }

        $bio = $_POST['bio'];
        if(!empty($bio)){
            $_SESSION['member']->setBio($bio);
            // $_SESSION['member']->setBio($bio)
        }
        if(empty($this->_f3->get("errors"))){
            $this->_f3->reroute('/interests');
        }
        }

        $view = new Template();
        echo $view->render('views/profile.html');

    }

    /*display interests.html*/
    function interests(){

        global $validator;

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["indoor"])) {
                $userIndoor = $_POST["indoor"];
                if ($validator->validIndoor($userIndoor)) {
                    $indoor = implode(" ", $userIndoor);
                    $_SESSION["indoor"] = $indoor;
                } else {
                    $this->_f3->set("errors['indoor]", "Valid interests only");
                }
            }

            if (isset($_POST["outdoor"])) {
                $_SESSION['outdoor'] = implode(" ", $_POST['outdoor']);
            }
            if(empty($this->_f3->get("errors"))){
                $this->_f3->reroute("/summary");
            }
        }
        $view = new Template();
        echo $view->render('views/interests.html');
    }

    function summary(){

       $view = new Template();
       echo $view->render('views/summary.html');

       session_destroy();
    }



}

