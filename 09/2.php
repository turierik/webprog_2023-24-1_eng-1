<?php
    $errors = [];
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';
    $accept = $_POST['accept'] ?? '';

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
    }
    // TASKS
    // 1. validate that the name has at least 2 words (there is a space)
    // 2. validate the email format
    // 3. validate that the age is an integer
    // 4. checkbox must be checked
    // 5. ---> print the errors :)
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
    <form action="2.php" method="POST">
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