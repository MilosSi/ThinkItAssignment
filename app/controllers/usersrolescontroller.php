<?php


namespace app\controllers;


use app\models\rolesModel;
use app\models\userModel;

class usersrolescontroller extends controler
{
    private $userModel;
    private $roleModel;

    function __construct()
    {
        $this->userModel= new userModel();
        $this->roleModel=new rolesModel();
    }

    public function index()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $users=$this->userModel->getAll();
        $roles=$this->roleModel->getAll();


        $data['users']=$users;
        $data['roles']=$roles;
        $this->view('userrolelist',$data);
        //echo json_encode($roles);
    }
    public function show()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $this->view('addroles');
    }
    public function store($dataInsert)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=users&login=false");
            die();
        }

        if($dataInsert['name'] == "")
        {
            header("Location:index.php?page=addroles&params=false");
            die();
        }
        if($this->roleModel->insertInto('roles',$dataInsert))
        {
            header("Location:index.php?page=users&insert=true");
        }
        else
        {
            header("Location:index.php?page=users&insert=false");
        }
    }
    public function editshow($id)
    {
        $data['role']=$this->roleModel->getSingleRole($id);

        $this->view('addroles',$data);
    }
    public function editstore($dataUpdate,$id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        if($dataUpdate['name'] == "")
        {
            header("Location:index.php?page=addroles&params=false");
            die();
        }
        $dataUpdate['updated_at']=date("Y-m-d H:i:s");
        if($this->roleModel->updateTable('roles',$id,$dataUpdate))
        {
            header("Location:index.php?page=users&update=true");
        }
        else
        {
            header("Location:index.php?page=users&update=false");
        }
    }
    public function delete($id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        if($id ==1)
        {
            header("Location:index.php?page=users&deleteadmin=false");
        }
        if($this->roleModel->deleteTable('users',$id,'role_id'))
        {
            if($this->roleModel->deleteTable('roles',$id))
            {
                header("Location:index.php?page=users&delete=true");
            }
            else
            {
                header("Location:index.php?page=users&deleteroles=false");
            }
        }
        else
        {
            header("Location:index.php?page=users&deleteusers=false");
        }
    }
    public function deleteuser($id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        $dataDelete['is_deleted']=1;
        $dataDelete['deleted_at']=date("Y-m-d H:i:s");
        //echo json_encode($dataDelete);

        if($this->userModel->updateTable('users',$id,$dataDelete))
        {
            header("Location:index.php?page=users&delete=true");
        }
        else
        {
            header("Location:index.php?page=users&delete=false");
        }
    }
}
