<?php


namespace app\models;


class notificationModel extends db
{
    public function getAll($limit=5200,$offset=0)
    {
        return $this->executeQuery("SELECT *, n.id as notid FROM notification n INNER JOIN users u ON n.user_not_id=u.id WHERE n.is_deleted = 0 LIMIT {$limit} OFFSET {$offset}");
    }
    public function getSingleNotification($id)
    {
        return $this->executeQueryWithParamsSingle("SELECT *, n.id as notid FROM notification n INNER JOIN users u ON n.user_not_id=u.id WHERE n.is_deleted = 0 AND n.id= ?",[$id]);
    }


    public function getNotificationRanks($notid)
    {
        return $this->executeQueryWithParams("SELECT r.id,r.rank_name FROM notification_ranks nr INNER JOIN ranks r ON nr.rank_id=r.id WHERE  r.is_deleted=0 AND nr.not_id =?",[$notid]);
    }

    public function getNotificationCrew($notid)
    {
        return $this->executeQueryWithParams("SELECT c.id,c.first_name,c.surname FROM crew c INNER JOIN crew_ranks cr ON c.id=cr.crew_id WHERE cr.rank_id IN ( SELECT rank_id FROM notification_ranks WHERE not_id = ? ) GROUP BY c.id",[$notid]);
    }
}
