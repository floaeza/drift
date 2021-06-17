<?php

$Option = !empty($_POST['Option']) ? $_POST['Option'] : 'GetDevices';
$MacAddress = !empty($_POST['MacAddress']) ? $_POST['MacAddress'] : '';
$Type = !empty($_POST['Type']) ? $_POST['Type'] : '';

$data = !empty($_POST['data']) ? $_POST['data'] : '';
$ArrayDeviceList = array();

switch ($Option) {
    case 'GetDevices':
        echo $data;
        break;
}