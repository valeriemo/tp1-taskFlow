<?php
require_once('class/Crud.php');

$crud = new Crud;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>


<body class="align">

        <div class="grid">
            <h1>Task Flow</h1>
            <form action="" method="POST" class="form login">

                <div class="form__field">
                    <label for="login__username"></label>
                    <input id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
                </div>

                <div class="form__field">
                    <label for="login__password"></label>
                    <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
                </div>

                <div class="form__field">
                    <input type="submit" value="Sign In">
                </div>

            </form>

            <p class="text--center">Not a member? <a href="#">Sign up now</a></p>

        </div>

    </body>

</html>