{{ include('header.php', {title: 'Welcome'}) }}  

{# commments in twig #}

<main>

    <div class="grid">
            <h1>Task Flow</h1>
            <form action="{{ path }}user" method="POST" class="form">
                <label>
                    <input type="text" name="username"  placeholder="Username" minlength="3" maxlength="20" required>
                </label>
                <label>
                    <input type="password" name="password"  placeholder="Password" minlength="8" maxlength="20" required>
                </label>
                <input type="submit" value="Sign in">
            </form>
            <a class="button-74" href="{{ path }}user/create">New user</a>

    </div>
</main>
</body>
</html>