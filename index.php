<?php
require_once('const.php');

if (file_exists(DAT_PATH) !== true) {
    error_log('No file exists');
    header('Location:' . URL . 'index.php');
    exit;
}

$fh = fopen(DAT_PATH, 'r');

$data = array();
while(feof($fh) !== true) {
    $row = fgetcsv($fh);
    if (is_array($row) !== true) {
        break;
    }
    $data[] = $row;
}

fclose($fh);

if (isset($_GET['error']) === true) {
    $error_msg = $ERROR[$_GET['error']];
}

$count = count($data);

include_once('views/index.html.php');
