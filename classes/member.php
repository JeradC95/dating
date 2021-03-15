<?php

    class Member{
        private $_firstname;
        private $_lastname;
        private $_age;
        private $_gender;
        private $_phonenumber;
        private $_email;
        private $_state;
        private $_seeking;
        private $_bio;
        private $_interests;

        /**
         * Member constructor.
         * @param $_firstname
         * @param $_lastname
         * @param $_age
         * @param $_gender
         * @param $_phonenumber
         */
        public function __construct()
        {
            //default constructor
        }


        /**
         * @return mixed
         */
        public function getFirstname()
        {
            return $this->_firstname;
        }

        /**
         * @param mixed $firstname
         */
        public function setFirstname($firstname)
        {
            $this->_firstname = $firstname;
        }

        /**
         * @return mixed
         */
        public function getLastname()
        {
            return $this->_lastname;
        }

        /**
         * @param mixed $lastname
         */
        public function setLastname($lastname)
        {
            $this->_lastname = $lastname;
        }

        /**
         * @return mixed
         */
        public function getAge()
        {
            return $this->_age;
        }

        /**
         * @param mixed $age
         */
        public function setAge($age)
        {
            $this->_age = $age;
        }

        /**
         * @return mixed
         */
        public function getGender()
        {
            return $this->_gender;
        }

        /**
         * @param mixed $gender
         */
        public function setGender($gender)
        {
            $this->_gender = $gender;
        }

        /**
         * @return mixed
         */
        public function getPhonenumber()
        {
            return $this->_phonenumber;
        }

        /**
         * @param mixed $phonenumber
         */
        public function setPhonenumber($phonenumber)
        {
            $this->_phonenumber = $phonenumber;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->_email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->_email = $email;
        }

        /**
         * @return mixed
         */
        public function getState()
        {
            return $this->_state;
        }

        /**
         * @param mixed $state
         */
        public function setState($state)
        {
            $this->_state = $state;
        }

        /**
         * @return mixed
         */
        public function getSeeking()
        {
            return $this->_seeking;
        }

        /**
         * @param mixed $seeking
         */
        public function setSeeking($seeking)
        {
            $this->_seeking = $seeking;
        }

        /**
         * @return mixed
         */
        public function getBio()
        {
            return $this->_bio;
        }

        /**
         * @param mixed $bio
         */
        public function setBio($bio)
        {
            $this->_bio = $bio;
        }

        public function getInterests(){
            return $this->_interests;
        }

        public function setInterests($interests){
            $this->_interests = $interests;
        }


}