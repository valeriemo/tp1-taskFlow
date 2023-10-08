{{ include('header.php', {title: 'Welcome'}) }}  


<main>

    <div class="grid">
            <h1>Task Flow</h1>
            <form  action="{{path}}login/auth" method="POST" class="form">
                <label>
                    <input type="text" name="username"  placeholder="Username" minlength="3" maxlength="20" required value="{{data.username}}">
                </label>
                <label>
                    <input type="password" name="password"  placeholder="Password" minlength="8" maxlength="20" required value="{{data.password}}">
                </label>
                <input type="submit" value="login">
            </form>
    </div>
</main>
</body>
</html>