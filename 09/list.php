<?php
    $data = json_decode(file_get_contents('data.json'), true);
    // var_dump($data);
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