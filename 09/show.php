<?php
    $data = json_decode(file_get_contents('data.json'), true);
    $id = $_GET['id'] ?? -1;
    if (!isset($data[$id])){
        header("location: list.php");
    }
?>

<h1>Personal data</h1>

Name: <?= $data[$id]["fullname"] ?> <br>
Email: <?= $data[$id]["email"] ?> <br>
Age: <?= $data[$id]["age"] ?><br><br>

<a href="modify.php?id=<?= $id ?>">Modify</a><br>
<a href="delete.php?id=<?= $id ?>">Delete</a>