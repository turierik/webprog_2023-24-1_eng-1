<?php
    include_once("storage.php");
    $stor = new Storage(new JsonIO('data.json'));
    $id = $_GET['id'] ?? -1;
    $data = $stor -> findById($id);
    if ($data !== null){
        $stor -> delete($id);
    }
    header("location: list.php");
?>