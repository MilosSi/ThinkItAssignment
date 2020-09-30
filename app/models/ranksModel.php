<?php


namespace app\models;


class ranksModel extends db
{
    public function getAll($limit=5200,$offset=0)
    {
        return $this->executeQuery("SELECT *, r.id as rankid FROM ranks r INNER JOIN users u ON r.user_id_ranks=u.id WHERE r.is_deleted = 0 LIMIT {$limit} OFFSET {$offset}");
    }
    public function getSingleRank($id)
    {
        return $this->executeQueryWithParamsSingle("SELECT *, r.id as rankid FROM ranks r INNER JOIN users u ON r.user_id_ranks=u.id WHERE r.is_deleted = 0 AND r.id = ?",[$id]);
    }
}
