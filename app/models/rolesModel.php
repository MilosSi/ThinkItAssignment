<?php


namespace app\models;


class rolesModel extends db
{
    public function getAll($limit=5200,$offset=0)
    {
        return $this->executeQuery("SELECT * FROM roles LIMIT {$limit} OFFSET {$offset}");
    }
    public function getSingleRole($id)
    {
        return $this->executeQueryWithParamsSingle("SELECT * FROM roles WHERE id= ?",[$id]);
    }
}
