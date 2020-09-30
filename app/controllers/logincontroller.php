<?php


namespace app\controllers;


use app\models\authModels;
use app\models\regex;
use app\models\rolesModel;

class logincontroller extends controler
{
    private $rolesModel;
    private $regex;
    private $authModel;

    function __construct()
    {
        $this->rolesModel = new rolesModel();
        $this->regex= new regex();
        $this->authModel= new authModels();
    }

    public function index()
    {
        $data['roles']=$this->rolesModel->getAll();
        $this->view('login',$data);
    }
    public function register_logic($dataInsert)
    {
        if($this->regex->checkUsername($dataInsert['username']) && $this->regex->checkEmail($dataInsert['email']) && $this->regex->checkPassword($dataInsert['password']))
        {
            $dataInsert['password']=password_hash($dataInsert['password'], PASSWORD_DEFAULT);
            $id=$this->authModel->insertInto('users',$dataInsert);

            if($id)
            {
                header("Location:index.php?page=logreg&reg=true");
            }
            else
            {
                header("Location:index.php?page=logreg&reg=false");
            }

        }
        else
        {
            header("Location:index.php?page=logreg&regex=false");
        }
    }
    public function login_logic($dataLogin)
    {
        if($this->regex->checkEmail($dataLogin['email']) && $this->regex->checkPassword($dataLogin['password']))
        {
            $user=$this->authModel->getUserByEmail($dataLogin['email']);
            if($user==false || $user->is_deleted == 1)
            {
                header("Location:index.php?page=logreg&login=false");
                die();
            }
            if(password_verify($dataLogin['password'],$user->password))
            {
                $_SESSION['user'] = $user;
                header("Location:index.php?page=ships&login=true");
            }
            else
            {
                header("Location:index.php?page=logreg&login=false");
            }
        }
        else
        {
            header("Location:index.php?page=logreg&regex=false");
        }
    }

    public function logout()
    {
        if(isset($_SESSION['user']))
        {
            unset($_SESSION["user"]);
            session_destroy();
            header("Location:index.php?page=logreg&logout=true");
        }
    }
}
