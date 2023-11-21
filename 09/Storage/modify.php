<?php
    $errors = [];

    include_once("storage.php");
    $stor = new Storage(new JsonIO('data.json'));
    $id = $_GET['id'] ?? -1;
    $data = $stor -> findById($id);
    if ($data === null){
        header("location: list.php");
    }

    $fullname = $_POST['fullname'] ?? $data["fullname"];
    $email = $_POST['email'] ??  $data["email"];
    $age = $_POST['age'] ??  $data["age"];
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
            
            $stor -> update($id, $person);

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