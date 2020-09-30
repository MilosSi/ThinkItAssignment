<?php

namespace app\models;

class db
{
    private $conn;

    function __construct()
    {
        try {
            $dsn='mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->conn=new \PDO($dsn,USERNAME,PASSWORD,$options);
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    //DBO Funkcije
    protected function executeQuery($query)
    {
        return $this->conn->query($query)->fetchAll();
    }
    protected function executeQuerySingle($query)
    {
        return $this->conn->query($query)->fetch();
    }

    protected function executeQueryWithParams($query,$params)
    {
        $prepare=$this->conn->prepare($query);
        $prepare->execute($params);

        return $prepare->fetchAll();

        //Query sa ? a params je niz [$ime,1]
    }
    protected function executeQueryWithParamsSingle($query,$params)
    {
        $prepare=$this->conn->prepare($query);
        $prepare->execute($params);

        return $prepare->fetch();
    }

    //CUSTOM HELPERS
    protected function getAll($table)
    {
        return $this->conn->query("SELECT * FROM {$table}")->fetchAll();
    }
    protected function getSingle($table,$id)
    {
        $prepare=$this->conn->prepare("SELECT * FROM {$table} WHERE id=?");

        $prepare->execute(array($id));

        return $prepare->fetch();
    }
    protected function getSingleWhere($table,$column,$param)
    {
        $prepare=$this->conn->prepare("SELECT * FROM {$table} WHERE {$column}=?");

        $prepare->execute(array($param));

        return $prepare->fetch();
    }

    //CRUD
    public function insertInto($table,$data)
    {
        $i = '';
        $h = '';
        $params=[];
        foreach ($data as $key => $value) {
            $i .= $key . ', ';
            $h .= '?, ';
            array_push($params,$value);
        }
        $insert =  substr($i, 0, -2);
        $hiddenValues = substr($h, 0, -2);

        $query="INSERT INTO {$table} ({$insert}) VALUES ({$hiddenValues})";

        $prepare=$this->conn->prepare($query);

        try {
            $this->conn->beginTransaction();
            $prepare->execute($params);
            $id=$this->conn->lastInsertId();
            $this->conn->commit();

            return $id;
        }
        catch(PDOExecption $e) {
            $this->conn->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
    }

    public function updateTable($table, $id, $data,$column='id')
    {
        $s = '';
        $params=[];
        foreach ($data as $key => $value) {
            $s .= $key . ' = ?,';
            array_push($params,$value);
        }
        $set =  substr($s, 0, -1);

        $prepare=$this->conn->prepare("UPDATE {$table} SET {$set} WHERE {$column} = ?");


        array_push($params,$id);

        try {
            $this->conn->beginTransaction();
            $ok=$prepare->execute($params);

            $this->conn->commit();

            return $ok;
        }
        catch(PDOExecption $e) {
            $this->conn->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }



//        if($ok==true)
//        {
//            return true;
//        }
//        else
//        {
//            return false;
//        }
    }

    public  function deleteTable($table,$id,$column="id")
    {
        $prepare=$this->conn->prepare("DELETE FROM {$table} WHERE {$column}=?");

        try {
            $this->conn->beginTransaction();
            $ok=$prepare->execute(array($id));

            $this->conn->commit();

            return $ok;
        }
        catch(PDOExecption $e) {
            $this->conn->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }

//        $ok=$prepare->execute(array($id));
//
//        if($ok)
//        {
//            return true;
//        }
//        else
//        {
//            return false;
//        }
    }

}
