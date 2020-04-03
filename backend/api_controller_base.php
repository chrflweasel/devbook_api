<?php

class APIControllerBase {
    protected $db;
    protected $err;
    protected $token;
    protected $user_id;
    protected $success = false;
    protected $error = null;
    protected $result = [];

    public function __construct($token, $user_id) {
        require_once 'db_communicator.php';
        require_once 'server_errors.php';
        $this->db = new DBCommunicator();
        $this->err = new ServerErrors();
        $this->token = $token;
        $this->user_id = $user_id;
    }

    protected function getResult() {
        if ($this->error !== null) {
            $this->result['error'] = $this->error;
        }

        $this->result['success'] = $this->success;
        return $this->result;
    }
}