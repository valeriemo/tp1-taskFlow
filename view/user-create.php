{{ include('header.php', {title: 'creer un user'}) }}


<body class="align">
    <div class="grid">
        <h1>Task Flow</h1>
        <h2>New user | Fill the form</h2>

        {% if errors is defined %}
        <span class="error">{{ errors|raw }}</span>
        {% endif %}

        <form action="{{path}}user/store" method="POST" class="form">
            <label>
                <input type="text" name="username" placeholder="Username" minlength="3" maxlength="20" required value="{{data.username}}">
            </label>
            <label>
                <input type="text" name="email" placeholder="Email" maxlength="45" required value="{{data.email}}">
            </label>
            <label>
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="20" required value="{{data.password}}">
            </label>
            <input type="submit" value="Save">
        </form>
    </div>
</body>

</html>