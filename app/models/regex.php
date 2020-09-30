<?php


namespace app\models;


class regex
{
    private $usernameRegex="/^[ČĆŠĐŽA-zčćšđž0-9]{1,40}$/";
    private $imeRegex="/^[ČĆŠĐŽA-zčćšđž]{1,40}$/";
    private $emailRegex="/^\w+[\w\-\.]*\@\w+((\-\w+)|(\w*))\.[a-z]{2,3}$/";
    private $lozinkaRegex="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

    public function checkUsername($username)
    {
        return preg_match($this->usernameRegex,$username);
    }

    public  function  checkName($ime)
    {
        return preg_match($this->imeRegex,$ime);
    }

    public function checkEmail($email)
    {
        return preg_match($this->emailRegex,$email);
    }

    public function checkPassword($lozinka)
    {
        return preg_match($this->lozinkaRegex,$lozinka);
    }

}
