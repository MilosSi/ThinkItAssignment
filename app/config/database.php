<?php

//Base url
DEFINE('BASE_URL',$_SERVER['DOCUMENT_ROOT'].'/');

//ENV putanja
DEFINE('ENV',BASE_URL.'app/config/.env');

//Database Podesavanja
DEFINE('SERVER',env('SERVER'));
DEFINE('USERNAME',env('USERNAME'));
DEFINE('PASSWORD',env('PASSWORD'));
DEFINE('DBNAME',env('DBNAME'));

//echo DBNAME;


function env($naziv)
{
    $envFile=file(ENV);
    $vrednost="";
    foreach ($envFile as $file)
    {
        $fileArray=explode('=',trim($file));
        if($fileArray[0] == $naziv)
        {
            $vrednost=$fileArray[1];
        }
    }
    return $vrednost;
}
?>
