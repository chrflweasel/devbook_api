<?php

class DBCommunicatorBase {
    protected $pdo;

    function __construct() {
        require_once 'db_loader.php';
        $this->pdo = getPDO();
    }

    protected function getArrayFromDB($query) {
        $r = $this->pdo->prepare($query);
        $r->execute();

        $res = [];
        while ($f = $r->fetch(PDO::FETCH_OBJ)) {
            if ($f) {
                $res[] = $f;
            }
        }

        return $res;
    }

    protected function getObjFromDB($query) {
        $r = $this->pdo->prepare($query);
        $r->execute();

        $f = $r->fetch(PDO::FETCH_OBJ);
        return $this->pdo->errorCode() == PDO::ERR_NONE ? $f : false;
    }

    protected function insertDB($query) {
        $r = $this->pdo->prepare($query);
        $r->execute();
        return $this->pdo->errorCode() == PDO::ERR_NONE;
    }
}