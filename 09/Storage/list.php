<?php
    include_once("storage.php");
    $stor = new Storage(new JsonIO('data.json'));
    $data = $stor -> findAll();
?>

<h1>List of people</h1>
<ul>
    <?php
        foreach($data as $id => $d){
            echo "<li><a href='show.php?id=". $id . "'>" . $d['fullname'] . "</a></li>";
        }
    ?>
</ul>

<a href="2.php">Add new person</a>