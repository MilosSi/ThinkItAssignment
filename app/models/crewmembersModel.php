<?php


namespace app\models;


class crewmembersModel extends db
{
    public function getAll($limit=5200,$offset=0)
    {
        return $this->executeQuery("SELECT *, c.id as crewid FROM crew c INNER JOIN users u ON c.user_id_crew=u.id WHERE c.is_deleted = 0 LIMIT {$limit} OFFSET {$offset}");
    }
    public function getCrewRank($crewid)
    {
        return $this->executeQueryWithParams("SELECT r.id,r.rank_name FROM crew_ranks cr INNER JOIN ranks r ON cr.rank_id=r.id WHERE r.is_deleted=0 and cr.crew_id=?",[$crewid]);
    }
    public function getSingleMember($id)
    {
        return $this->executeQueryWithParamsSingle("SELECT *, c.id as crewid FROM crew c INNER JOIN users u ON c.user_id_crew=u.id WHERE c.is_deleted = 0 AND c.id= ?",[$id]);
    }

}
