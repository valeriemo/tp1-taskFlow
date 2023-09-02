<?php
require_once('class/Partial.php');
echo Partial::head();
?> 
<body class="align">
    <div class="grid">
            <h1>Task Flow</h1>
            <h2>Fill the form</h2>
            <form action="user-store.php" method="POST" class="form">
                <label>
                    <input type="text" name="username"  placeholder="Username" minlength="3" maxlength="20" required>
                </label>
                <label>
                    <input type="text" name="email"  placeholder="Email" maxlength="45" required>
                </label>
                <label>
                    <input type="password" name="password"  placeholder="Password" minlength="8" maxlength="20" required>
                </label>
                <input type="submit" value="Sign up">
            </form>
    </div>
</body>

</html>