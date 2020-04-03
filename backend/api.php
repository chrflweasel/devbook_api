<?php

require_once 'server_errors.php';
$error = null;
$err = new ServerErrors();

if (count($_POST) > 0) {
    if (array_key_exists('action', $_POST)) {
        $userid = $_POST['userid'];
        $token = $_POST['token'];
        $action = $_POST['action'];
        require_once 'api_controller.php';
        $api = new APIController($token, $userid);
        switch ($action) {
            case 'GETTEST':
                $result = $api->getTest();
                break;
            default:
                $result = $error = $err->unknownActKeyError();
                break;
        }
    }
} else $error = $err->notPOSTcallError();

if (!array_key_exists('error', $result) && $error !== null) {
    $success = false;
    $result['success'] = false;
    $result['error'] = $error;
}

if (!array_key_exists('success', $result)) {
    $result['success'] = $success === null ? false : $success;
}

echo json_encode($result);