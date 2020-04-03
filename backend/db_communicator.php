<?php

require_once 'db_communicator_base.php';

class DBCommunicator extends DBCommunicatorBase {
    public function test() {
        $sql = "SELECT * FROM test";
        return $this->getObjFromDB($sql);
    }
}