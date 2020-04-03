<?php

function makeError($code, $message_ru, $message_ua, $message_en) {
    $e['code'] = $code;
    $e['message_ru'] = $message_ru;
    $e['message_ua'] = $message_ua;
    $e['message_en'] = $message_en;
    return $e;
}