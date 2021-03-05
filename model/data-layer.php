<?php

class DatingDataLayer
{

    function getIndoorInterests()
    {
        return array("tv", "gaming", "movies", "cooking", "reading", "art");
    }

    function getOutdoorInterests()
    {
        return array("cycling", "hiking", "camping", "animals", "swimming", "running");
    }

    function getGender()
    {
        return array("male", "female");
    }

    function getState()
    {
        return array("Washington", "Oregon", "California");
    }
}