<?php
if (!isset($_GET['list'])) {
    $_GET['list'] = array();
}

$id = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['list'][$id])) {
    $_GET['list'][$id]++;
} else {
    $_GET['list'][$id] = 1;
}

header("Location: basket.php");
?>