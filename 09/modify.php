<?php
    $errors = [];

    $data = json_decode(file_get_contents('data.json'), true);
    $id = $_GET['id'] ?? -1;
    if (!isset($data[$id])){
        header("location: list.php");
    }

    $fullname = $_POST['fullname'] ?? $data[$id]["fullname"];
    $email = $_POST['email'] ??  $data[$id]["email"];
    $age = $_POST['age'] ??  $data[$id]["age"];
    $accept = $_POST['accept'] ??  true;

    if ($_POST){
        if (count(explode(' ', $fullname)) < 2){
            $errors['fullname'] = 'Name should have at least 2 words.';
        } 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'The e-mail is not valid.';
        }

        if (filter_var($age, FILTER_VALIDATE_INT) === false){
            $errors['age'] = 'The age should be an integer.';
        }

        if (!filter_var($accept, FILTER_VALIDATE_BOOLEAN)){
            $errors['accept'] = 'Checkbox be checked.';
        }

        if (count($errors) === 0){
            $person = [
                "fullname" => $fullname,
                "email" => $email,
                "age" => intval($age)
            ];
            
            $data[$id] = $person;
            file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
            header("location: list.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php 
            foreach($errors as $e)
                echo "<li>$e</li>";
        ?>
    </ul>
    <form action="modify.php?id=<?= $id ?>" method="POST">
        Full name: <input type="text" name="fullname" value="<?= $fullname ?>">
        <?= $errors['fullname'] ?? '' ?>
        <br>
        E-mail: <input type="text" name="email" value="<?= $email ?>">
        <?= $errors['email'] ?? '' ?>
        <br>
        Age (int): <input type="text" name="age" value="<?= $age ?>">
        <?= $errors['age'] ?? '' ?>
        <br>
        Accept the terms <input type="checkbox" name="accept"
            <?= $accept ? 'checked' : '' ?>
        ><?= $errors['accept'] ?? '' ?> <br>
        <button>Send</button>
    </form>

    <?php if($_POST && count($errors) === 0): ?>
        <h1>Congratulations, you did it! :)</h1>
    <?php endif; ?>
</body>
</html>