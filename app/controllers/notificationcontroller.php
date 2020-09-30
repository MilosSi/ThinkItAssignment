<?php


namespace app\controllers;


use app\models\crewmembersModel;
use app\models\imageModel;
use app\models\notificationModel;
use app\models\ranksModel;

class notificationcontroller extends controler
{
    private $notModel;
    private $imageModel;
    private $ranksModel;
    private $crewModel;

    function __construct()
    {
        parent::__construct();
        $this->notModel= new notificationModel();
        $this->imageModel=new imageModel();
        $this->ranksModel= new ranksModel();
        $this->crewModel= new crewmembersModel();
    }

    public function index()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $notifications=$this->notModel->getAll();
        foreach ($notifications as $not)
        {
            $not->ranks=$this->notModel->getNotificationRanks($not->notid);
        }
        $data['notifications']=$notifications;


        $this->view('notificationlist',$data);
    }
    public function show()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $data['ranks']=$this->ranksModel->getAll();

        $this->view('addnotification',$data);
    }
    public function store($dataInsert,$dataRanks)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        if(empty($dataInsert['not_name']) || empty($dataInsert['content']) || empty($dataRanks['ranks']))
        {
            header("Location:index.php?page=addnotification&params=false");
            die();
        }

        $dataInsert['user_not_id']=$_SESSION['user']->id;

        $idNot=$this->notModel->insertInto('notification',$dataInsert);
        if($idNot)
        {
            $okNotRanks=0;
            $dataNR['not_id']=$idNot;
            for($i=0;$i<count($dataRanks['ranks']);$i++)
            {
                $dataNR['rank_id']=$dataRanks['ranks'][$i];
                $okNotRanks=$this->notModel->insertInto('notification_ranks',$dataNR);
            }
            if($okNotRanks != 0)
            {
                header("Location:index.php?page=notifications&insert=true");
            }
            else
            {
                header("Location:index.php?page=addnotification&ranks=false");
            }
        }
        else
        {
            header("Location:index.php?page=addnotification&insertnot=false");
        }
    }

    public function addeditorimg()
    {

        if ($_FILES['file']['name'])
        {
            $okPomeraj=$this->imageModel->uploadImage('file','/editorimg');
            if($okPomeraj)
            {
                echo json_encode( "/app/assets/dist/img/editorimg/".$_FILES['file']['name']);
            }
            else
            {
                echo  $message = 'Ooops!  Your upload triggered the error ';
            }
        }
        else
        {
            echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
        }
    }
    public function editshow($id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");

        }
        $notification=$this->notModel->getSingleNotification($id);

        $notification->ranks=$this->notModel->getNotificationRanks($notification->notid);
        $notificationCrew=$this->notModel->getNotificationCrew($id);
        foreach ($notificationCrew as $nc)
        {
            $nc->ranks=$this->crewModel->getCrewRank($nc->id);
        }

        $data['ranks']=$this->ranksModel->getAll();
        $data['notification']=$notification;
        $data['crewmembers']=$notificationCrew;

        //echo  json_encode($notificationCrew);
        $this->view('addnotification',$data);


    }
    public function editstore($dataUpdate,$dataRanks,$id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        if(empty($dataUpdate['not_name']) || empty($dataUpdate['content']) || empty($dataRanks['ranks']))
        {
            header("Location:index.php?page=addnotification&params=false");
            die();
        }
        $dataUpdate['user_not_id']=$_SESSION['user']->id;
        $dataUpdate['updated_at']=date("Y-m-d H:i:s");

        if($this->notModel->updateTable('notification',$id,$dataUpdate))
        {
            $okDeleteRanks=$this->notModel->deleteTable('notification_ranks',$id,'not_id');
            if($okDeleteRanks)
            {
                $okNotRanks=0;
                $dataNR['not_id']=$id;
                for($i=0;$i<count($dataRanks['ranks']);$i++)
                {
                    $dataNR['rank_id']=$dataRanks['ranks'][$i];
                    $okNotRanks=$this->notModel->insertInto('notification_ranks',$dataNR);
                }
                if($okNotRanks != 0)
                {
                    header("Location:index.php?page=notifications&update=true");
                }
                else
                {
                    header("Location:index.php?page=addnotification&ranks=false");
                }
            }
            else
            {
                header("Location:index.php?page=notifications&deleteranks=false");
            }
        }
        else
        {
            header("Location:index.php?page=notifications&updatecrew=false");
        }
    }

    public function delete($id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        $dataDelete['is_deleted']=1;
        $dataDelete['deleted_at']=date("Y-m-d H:i:s");
        if($this->notModel->updateTable('notification',$id,$dataDelete))
        {
            $this->notModel->deleteTable('notification_ranks',$id,'not_id');
            header("Location:index.php?page=notifications&delete=true");
        }
        else
        {
            header("Location:index.php?page=notifications&delete=false");
        }
    }

}
