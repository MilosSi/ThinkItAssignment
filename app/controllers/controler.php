<?php

namespace app\controllers;

class controler
{
    protected $date;
    function __construct()
    {
        date_default_timezone_set("Europe/Belgrade");
        $this->date=date("Y-m-d H:i:s");
    }

    public function view($filename,$data=[]){
        extract($data);

        require_once 'app/views/head.php';
        require_once 'app/views/navbar.php';
        require_once 'app/views/sidebar.php';
        require_once "app/views/pages/$filename.php";
        require_once "app/views/footer.php";
    }
}
