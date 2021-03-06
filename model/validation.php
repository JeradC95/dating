<?php

/*
 * model/validation.php
 * validation functions
 */
class DatingValidate{

    private $_dataLayer;

    function __construct(){
        $this->_dataLayer = new DatingDataLayer();
    }

function validName($name) {
    return !empty($name);
}

function validAge($age)
{
    return ($age > 18 && $age < 118);
}

function validEmail($email)
{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return (filter_var($email, FILTER_VALIDATE_EMAIL));

}

function validPhone($phone)
{
    if (strlen($phone) === 10) {
        return is_numeric($phone);
    }
}

function validGender($gender)
{
    $value = $this->_dataLayer->getGender();
    return (in_array($gender, $value));
}

function validOutdoor($outdoor)
{
    $value = $this->_dataLayer->getOutdoorInterests();
    foreach ($outdoor as $var) {
        if (!in_array($var, $value)) {
            return false;
        }
    }
    return true;
}

function validIndoor($indoor)
{
    $value = $this->_dataLayer->getIndoorInterests();
    var_dump($indoor);
    echo('<br>');
    var_dump($value);
    foreach ($indoor as $var) {
        if (!in_array($var, $value)) {
            return false;
        }
    }
    return true;
}

function validState($state)
{
    $value = getState();
    return (in_array($state, $value));
}
}
