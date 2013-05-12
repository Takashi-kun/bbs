<?php
require_once('const.php');


if (file_exists(DAT_PATH) !== true) {
    error_log('No file exists');
    header('Location:' . URL . 'index.php');
    exit;
}

if (isset($_POST['send']) !== true) {
    header('Location:' . URL . 'index.php');
    exit;
}

if (isset($_POST['user_name']) !== true || isset($_POST['text_body']) !== true) {
    header('Location:' . URL . 'index.php?error=1');
    exit;
}


$name = $_POST['user_name'];
$body = $_POST['text_body'];

if (mb_strlen($name) <= 0 || mb_strlen($body) <= 0) {
    header('Location:' . URL . 'index.php?error=1');
    exit;
}

$time = date('Y/m/d H:i:s');

$fh = fopen(DAT_PATH, 'a+');
$fwrite = fwrite($fh, htmlspecialchars($name) . ',' . htmlspecialchars($body) . ',' . $time . "\r\n");

if ($fwrite === false) {
    header('Location:' . URL . 'index.php?error=2');
    exit;
}


header('Location:' . URL . 'index.php');
exit;
