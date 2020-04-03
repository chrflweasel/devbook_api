<?php

require_once 'api_controller_base.php';

class APIController extends APIControllerBase {
    public function getTest() {
        $this->result['test'] = $this->db->test();
        $this->success = true;
        return $this->getResult();
    }
}