{{ include('header.php', {title: 'creer un user'}) }}


<body class="align">
    <div class="grid">
            <h1>Task Flow</h1>
            <h2>New user | Fill the form</h2>
            <form action="{{path}}user/store" method="POST" class="form">
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
