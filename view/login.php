{{ include('header.php', {title: 'Login'})}}


{% if errors is defined %}
<span class="error">{{ errors|raw }}</span>
{% endif %}
<form action="{{path}}login/auth" method="post">
    <label>Username
        <input type="text" name="username" value="{{data.username}}">
    </label>
    <label>Password
        <input type="password" name="password" value="{{data.password}}">
    </label>
    <input type="submit" value="login">
</form>