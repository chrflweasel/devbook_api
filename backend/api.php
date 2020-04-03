<?php

require_once 'server_errors.php';
$error = null;
$err = new ServerErrors();

if (count($_POST) > 0) {

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