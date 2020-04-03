<?php

require_once 'errors_maker.php';

class ServerErrors {
    public function notPOSTcallError() {
        return makeError(
            1,
            'Запрос не является POST',
            'Запит не є POST',
            'Non-POST request');
    }
}