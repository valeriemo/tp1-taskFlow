<?php
require_once('class/Crud.php');
require_once('class/Partial.php');


$crud = new Crud;


?>
<?php
echo Partial::head();
?>



<body class="align">

    <div class="grid">
        <h1>Task Flow</h1>

        <form action="user-login.php" method="POST" class="form">
            <label>
                <input type="text" name="username"  placeholder="Username" required>
            </label>
            <label>
                <input type="password" name="password"  placeholder="Password" required>
            </label>
            <input type="submit" value="Sign In">
        </form>

        <p>Not a member? <a href="user-create.php">Sign up now</a></p>

    </div>

</body>

</html>