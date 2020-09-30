<?php


namespace app\models;


class shipsModel extends db
{
    public function getAll($limit=5200,$offset=0)
    {
        return $this->executeQuery("SELECT *, s.id as shipid FROM ships s INNER JOIN users u ON s.user_id=u.id WHERE s.is_deleted = 0 LIMIT {$limit} OFFSET {$offset}");
    }
    public function getShipById($id)
    {
        return $this->executeQueryWithParamsSingle("SELECT *, s.id as shipid FROM ships s INNER JOIN users u ON s.user_id=u.id WHERE s.is_deleted = 0 AND s.id = ?",[$id]);
    }
    public function getShipCrewMembers($id,$type="in")
    {
        $query="SELECT * FROM crew where is_deleted = 0 AND ship_id";
        if($type == "in")
        {
            $query.=" = ?";
        }
        else
        {
            $query.=" != ?";
        }
        return $this->executeQueryWithParams($query,[$id]);
    }
}
