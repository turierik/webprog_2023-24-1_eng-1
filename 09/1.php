<?php
    // var_dump($_GET);
    $a = $_POST['a'] ?? null;
    $b = $_POST['b'] ?? null;
    $result = null;
    if ($a !== null && $b !== null)
        $result = intval($a) + intval($b);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="1.php" method="POST">
        a = <input type="number" name="a" value="<?= $_POST['a'] ?? '' ?>"><br>
        b = <input type="number" name="b" value="<?= $_POST['b'] ?? '' ?>"><br>
        <button>Send</button>
    </form>
    a + b = <?= $result ?>

</body>
</html>