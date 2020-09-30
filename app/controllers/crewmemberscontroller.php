<?php


namespace app\controllers;


use app\models\crewmembersModel;
use app\models\ranksModel;
use app\models\shipsModel;

class crewmemberscontroller extends controler
{
    private $cmModels;
    private $ships;
    private $ranks;
    function __construct()
    {
        parent::__construct();
        $this->cmModels=new crewmembersModel();
        $this->ships=new shipsModel();
        $this->ranks=new ranksModel();
    }

    public function index()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        $crew=$this->cmModels->getAll();
        foreach ($crew as $cr)
        {
            $cr->ranks=$this->cmModels->getCrewRank($cr->crewid);
            $cr->ship=$this->ships->getShipById($cr->ship_id);
        }
        $data['crew']=$crew;
        $this->view('crewlist',$data);
        //echo json_encode($crew);
    }
    public function show()
    {
        $data['ships']=$this->ships->getAll();
        $data['ranks']=$this->ranks->getAll();


        $this->view('addcrewmember',$data);
    }
    public function store($dataInsert,$dataRanks)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
            die();
        }
        if(empty($dataInsert['ship_id']) || empty($dataRanks['ranks']))
        {
            header("Location:index.php?page=addcrew&params=false");
            die();
        }

        $dataInsert['user_id_crew']=$_SESSION['user']->id;

        $idCrew=$this->cmModels->insertInto('crew',$dataInsert);


        if($idCrew)
        {
            $okCrewRanks=0;
            $dataCM['crew_id']=$idCrew;
            $dataCM['rc_user_id']=$_SESSION['user']->id;
            for($i=0;$i<count($dataRanks['ranks']);$i++)
            {
                $dataCM['rank_id']=$dataRanks['ranks'][$i];
                $okCrewRanks=$this->cmModels->insertInto('crew_ranks',$dataCM);
            }
            if($okCrewRanks!=0)
            {
                header("Location:index.php?page=crewmembers&insert=true");
            }
            else
            {
                header("Location:index.php?page=addcrew&insertranks=false");
            }
        }
        else
        {
            header("Location:index.php?page=addcrew&insertcrew=false");
        }
    }
    public function editshow($id)
    {
        $data['ships']=$this->ships->getAll();
        $data['ranks']=$this->ranks->getAll();
        $member=$this->cmModels->getSingleMember($id);
        $member->ranks=$this->cmModels->getCrewRank($id);
        //echo json_encode($member);
        $data['member']=$member;
        $this->view('addcrewmember',$data);
    }
    public function editstore($dataUpdate,$dataRanks,$id)
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->role_id !=1)
        {
            header("Location:index.php?page=logreg&login=false");
        }
        if(empty($dataUpdate['ship_id']) || empty($dataRanks['ranks']))
        {
            header("Location:index.php?page=crewmembers&params=false");
            die();
        }
        $dataUpdate['user_id_crew']=$_SESSION['user']->id;
        $dataUpdate['updated_at']=date("Y-m-d H:i:s");

        if($this->cmModels->updateTable('crew',$id,$dataUpdate))
        {
            $okDeleteRanks=$this->cmModels->deleteTable('crew_ranks',$id,'crew_id');
            if($okDeleteRanks)
            {
                $okCrewRanks=0;
                $dataCM['crew_id']=$id;
                $dataCM['rc_user_id']=$_SESSION['user']->id;
                for($i=0;$i<count($dataRanks['ranks']);$i++)
                {
                    $dataCM['rank_id']=$dataRanks['ranks'][$i];
                    $okCrewRanks=$this->cmModels->insertInto('crew_ranks',$dataCM);
                }
                if($okCrewRanks)
                {
                    header("Location:index.php?page=crewmembers&update=true");
                }
                else
                {
                    header("Location:index.php?page=crewmembers&update=false");
                }
            }
            else
            {
                header("Location:index.php?page=crewmembers&deleteranks=false");
            }
        }
        else
        {
            header("Location:index.php?page=crewmembers&updatecrew=false");
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
        if($this->cmModels->updateTable('crew',$id,$dataDelete))
        {
            $this->cmModels->deleteTable('crew_ranks',$id,'crew_id');
            header("Location:index.php?page=crewmembers&delete=true");
        }
        else
        {
            header("Location:index.php?page=crewmembers&delete=false");
        }
    }
}
