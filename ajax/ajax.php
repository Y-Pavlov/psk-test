<?php

use JsonCoverter\App\Ajax;

require_once(dirname(__DIR__, 1) . '/vendor/autoload.php');

$obAjax = new Ajax();

try {
    $arResponse = $obAjax->execute();
} catch (Exception $e) {
    $sErrorMessage = 'Ошибка! ' . $e->getMessage();
    $arResponse['message'] = $sErrorMessage;
}

echo $arResponse;