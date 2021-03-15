<?php

class Database
{
    function connect(){
        require $_SERVER['DOCUMENT_ROOT'].'/../config.php';
    }

    function insertMember(){
        global $dbh;
        $sql = "INSERT INTO members(fname, lname, age, gender, phone, email, state, seeking, interests, bio) VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking,:interests, :bio)";

        $statement = $dbh->prepare($sql);

        $fname=$_SESSION['member']->getFirstName();
        $lname=$_SESSION['member']->getLastName();
        $age=$_SESSION['member']->getAge();
        $gender=$_SESSION['member']->getGender();
        $phone=$_SESSION['member']->getPhoneNumber();
        $email=$_SESSION['member']->getEmail();
        $state=$_SESSION['member']->getState();
        $seeking=$_SESSION['member']->getSeeking();
        $interests=$_SESSION['member']->getInterests();
        $bio=$_SESSION['member']->getBio();

        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':age', $age, PDO::PARAM_STR);
        $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);

        $statement->execute();
    }

    function getMembers(){
        global $dbh;
        $sql = "SELECT * FROM members";

        $statement = $dbh->prepare($sql);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }


}