<?php


namespace app\models;


class imageModel
{
    public function uploadImage($fileName,$directory)
    {
        $dozvoljeneEks = array("gif", "jpeg", "jpg", "png", "swf", "JPG", "PNG", "JPEG", "GIF");
        $temp = explode(".", $_FILES[$fileName]['name']);
        $extension = end($temp); //Ekstenzija
        if($_FILES[$fileName]['size'] < 200000000 && in_array($extension, $dozvoljeneEks)){

            if(file_exists("app/assets/dist/img" . $directory . "/" . $_FILES[$fileName]['name']))
            {
                $split = explode(".", $_FILES[$fileName]['name']);
                $split[0] = $split[0] . rand();
                $file = implode('.', $split);
            }
            else
            {
                $file = $_FILES[$fileName]['name'];
            }
            $_SESSION[$fileName] = $file;
            $ok=move_uploaded_file($_FILES[$fileName]['tmp_name'], "app/assets/dist/img" . $directory . "/" . $_SESSION[$fileName]);
            return $ok;
        }

    }
}
