

<?php

    require_once "../required/configue.php";

    session_start();

    if ($_POST) {

        $user = $_POST['user'];
        $passe = $_POST['passe'];

        

        $select = "SELECT * FROM `login` WHERE `user` = :user AND passe = :passe";
        $pdo = $connect ->prepare($select);
        $pdo ->execute([
            'user' => $_POST['user'],
            'passe' => $_POST['passe']
        ]);

        $count = $pdo ->rowCount();
        if ($count > 0) {
            $_SESSION['user'] = $_POST['user'];
            header('location: dashboard.php');
        }else {
            $message = "<div class='alert bg-danger-subtle'>User Or Passe is invalid </div>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="login-container">
        <form method="post" action="">
        
            <h2>Login</h2>
            <?php
                if (isset($message)) {
                    echo $message ;
                }
            ?>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="user" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="passe" required>
            </div>
            <button type="submit">Login </button>
        </form>
    </div>
</body>
</html>
