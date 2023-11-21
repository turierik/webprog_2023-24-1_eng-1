<?php
    include_once("storage.php");
    $stor = new Storage(new JsonIO('data.json'));
    $id = $_GET['id'] ?? -1;
    $data = $stor -> findById($id);
    if ($data === null){
        header("location: list.php");
    }
?>

<h1>Personal data</h1>

Name: <?= $data["fullname"] ?> <br>
Email: <?= $data["email"] ?> <br>
Age: <?= $data["age"] ?><br><br>

<a href="modify.php?id=<?= $id ?>">Modify</a><br>
<a href="delete.php?id=<?= $id ?>">Delete</a>