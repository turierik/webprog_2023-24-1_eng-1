<?php
    $data = json_decode(file_get_contents('data.json'), true);
    $id = $_GET['id'] ?? -1;
    if (!isset($data[$id])){
        header("location: list.php");
    } else {
        unset($data[$id]);
        file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
        header("location: list.php");
    }
?>