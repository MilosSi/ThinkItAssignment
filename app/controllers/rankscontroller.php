<?php


namespace app\controllers;


use app\models\ranksModel;

class rankscontroller extends controler
{
    private $ranks;

    function __construct()
    {
        $this->ranks= new ranksModel();
    }

    public function index()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $data['ranks']=$this->ranks->getAll();
        //echo json_encode($data['ranks']);
        $this->view('rankslist',$data);
    }

    public function show()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $this->view('addranks');
    }
    public function store($dataInsert)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        if(empty($dataInsert['rank_name']))
        {
            header("Location:index.php?page=addrank&params=false");
            die();
        }

        $dataInsert['user_id_ranks']=$_SESSION['user']->id;
        if($this->ranks->insertInto('ranks',$dataInsert))
        {
            header("Location:index.php?page=ranks&insert=true");
        }
        else
        {
            header("Location:index.php?page=ranks&insert=false");
        }
    }
    public function editshow($id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $rank=$this->ranks->getSingleRank($id);
        $data['rank']=$rank;
        //echo  json_encode($rank);
        $this->view('addranks',$data);
    }
    public function editstore($dataUpdate,$id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        if(empty($dataUpdate['rank_name']))
        {
            header("Location:index.php?page=ranks&params=false");
            die();
        }
        $dataUpdate['updated_at']=date("Y-m-d H:i:s");
        $dataUpdate['user_id_ranks']=$_SESSION['user']->id;
        if($this->ranks->updateTable('ranks',$id,$dataUpdate))
        {
            header("Location:index.php?page=ranks&update=true");
        }
        else
        {
            header("Location:index.php?page=ranks&update=false");
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
        if($this->ranks->updateTable('ranks',$id,$dataDelete))
        {
            $this->ranks->deleteTable('crew_ranks',$id,'rank_id');
            $this->ranks->deleteTable('notification_ranks',$id,'rank_id');
            header("Location:index.php?page=ranks&delete=true");
        }
        else
        {
            header("Location:index.php?page=ships&delete=false");
        }
    }


}
