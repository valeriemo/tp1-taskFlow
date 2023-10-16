{{ include('header.php', {title: 'Login'})}}


<main>
    <div class="grid">
        <h1>Task Flow</h1>
        {% if errors is defined %}
        <span class="error">{{ errors|raw }}</span>
        {% endif %}
        <form action="{{path}}login/auth" method="POST" class="form">
            <label>
                <input type="text" name="username" placeholder="Username" minlength="3" maxlength="20" value="{{data.username}}" required >
            </label>
            <label>
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="20" value="{{data.password}}" required >
            </label>
            <input type="submit" value="login">
        </form>
    </div>
</main>
</body>

</html>