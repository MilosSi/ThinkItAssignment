<?php


namespace app\models;


class authModels extends db
{
    public function getUserByEmail($email)
    {
        return $this->executeQueryWithParamsSingle("SELECT * FROM users WHERE email=? AND is_deleted = 0",[$email]);
    }
}
