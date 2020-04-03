<?php

require_once 'db_communicator_base.php';

class StartTablesGenerator extends DBCommunicatorBase {
    function generateTables() {
        $sqls = [];

        foreach ($sqls AS $sql) {
            $this->insertDB($sql);
        }

        $this->createFolderIfNotExists('imgs/avatars'); //for avatar images
    }

    private function createFolderIfNotExists($path) {
        if (!file_exists($path)) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . "/$path", 0777, true);
        }
    }
}