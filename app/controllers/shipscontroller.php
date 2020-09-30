<?php


namespace app\controllers;


use app\models\crewmembersModel;
use app\models\imageModel;
use app\models\shipsModel;

class shipscontroller extends controler
{
    private $shipsModel;
    private $imageModel;
    private $cmModel;

    function __construct()
    {
        $this->shipsModel= new shipsModel();
        $this->imageModel=new imageModel();
        $this->cmModel=new crewmembersModel();
    }

    public function index()
    {

        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $data['ships']=$this->shipsModel->getAll();
        $this->view('shipslist',$data);
    }

    public function show()
    {
        if(!isset($_SESSION['user']) && $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }

        $this->view('addships');
    }

    public function store($dataInsert)
    {
        if(!isset($_SESSION['user']) && $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        if(empty($dataInsert['ship_name']) || empty($dataInsert['serial_num']) || empty($_FILES['shippic']) || strlen($dataInsert['serial_num'])>8)
        {
            header("Location:index.php?page=ships&params=false");
            die();
        }

        $dataInsert['image_path']=$_FILES['shippic']['name'];
        $dataInsert['user_id']=$_SESSION['user']->id;

        $okPomeraj=$this->imageModel->uploadImage('shippic','/ships');
        if($okPomeraj)
        {
            if($this->shipsModel->insertInto('ships',$dataInsert))
            {
                header("Location:index.php?page=ships&insert=true");
            }
            else
            {
                header("Location:index.php?page=addship&insert=false");
            }
        }
        else
        {
            header("Location:index.php?page=addship&picture=false");
        }

        //echo json_encode($dataInsert);
    }

    public function editshow($id)
    {
        if(!isset($_SESSION['user']) && $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $ship=$this->shipsModel->getShipById($id);
        $crewMembers=$this->shipsModel->getShipCrewMembers($id);
        foreach ($crewMembers as $cm)
        {
            $cm->ranks=$this->cmModel->getCrewRank($cm->id);
        }
        $crewMembersOut=$this->shipsModel->getShipCrewMembers($id,'out');
        foreach ($crewMembersOut as $cro)
        {
            $cro->ranks=$this->cmModel->getCrewRank($cro->id);
            $cro->ship=$this->shipsModel->getShipById($cro->ship_id);
        }
        $data['crewmembersout']=$crewMembersOut;

        $data['ship']=$ship;
        $data['crewmembers']=$crewMembers;
        $this->view('addships',$data);
    }
    public function editstore($dataInsert,$id)
    {
        if(!isset($_SESSION['user']) && $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        if(empty($dataInsert['ship_name']) || empty($dataInsert['serial_num']) || empty($_FILES['shippic']) || strlen($dataInsert['serial_num'])>8)
        {
            header("Location:index.php?page=addship&params=false");
            die();
        }
        $ship=$this->shipsModel->getShipById($id);
        $slikaOk=true;
        if(!empty($_FILES['shippic']['name']))
        {
            $dataInsert['image_path']=$_FILES['shippic']['name'];
            unlink('app/assets/dist/img/ships/'.$ship->image_path);
            $slikaOk=$this->imageModel->uploadImage('shippic','/ships');
        }

        if($slikaOk)
        {
            $dataInsert['user_id']=$_SESSION['user']->id;
            $dataInsert['updated_at']=date("Y-m-d H:i:s");

            if($this->shipsModel->updateTable('ships',$id,$dataInsert))
            {
                header("Location:index.php?page=ships&update=true");
            }
            else
            {
                header("Location:index.php?page=ships&update=false");
            }
        }
        else
        {
            header("Location:index.php?page=ships&picture=false");
        }
    }
    public function delete($id)
    {
        if(!isset($_SESSION['user']) && $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        $dataDelete['is_deleted']=1;
        $dataDelete['deleted_at']=date("Y-m-d H:i:s");
        if($this->shipsModel->updateTable('ships',$id,$dataDelete))
        {
            header("Location:index.php?page=ships&delete=true");
        }
        else
        {
            header("Location:index.php?page=ships&delete=false");
        }
    }
    public function addcrewmember($id,$shipid)
    {
        if(!isset($_SESSION['user']) && $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $dataUpd['ship_id']=$shipid;
        $dataUpd['updated_at']=date("Y-m-d H:i:s");
        $dataUpd['user_id_crew']=$_SESSION['user']->id;
        if($this->cmModel->updateTable('crew',$id,$dataUpd))
        {
            http_response_code(200);
        }
        else
        {
            http_response_code(500);
        }

    }

}
