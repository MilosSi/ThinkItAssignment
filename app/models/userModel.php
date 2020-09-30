<?php


namespace app\models;


class userModel extends db
{
    public function getAll($limit=5200,$offset=0)
    {
        return $this->executeQuery("SELECT *,u.id as uid FROM users u INNER JOIN roles r ON u.role_id = r.id WHERE u.is_deleted=0 LIMIT {$limit} OFFSET {$offset}");
    }
}
