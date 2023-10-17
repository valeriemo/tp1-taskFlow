{{ include('header.php', {title: 'create new user'}) }}


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
            <label>
                <!-- Cacher l'option Admin pour les utilisateurs -->
                <select name="privilege_idPri">
                    <option>Membership Level</option>
                    {% for privilege in privileges %}
                        {% if privilege.idPri != 3 %}
                        <option value="{{ privilege.idPri }}">{{ privilege.privilege }}</option>
                        {% endif %}
                    {% endfor%}
                </select>
            </label>
            <input type="submit" value="Save">
        </form>

        <section class="boite-member">
            <div>
                <h2>Regular</h2>
                <ul>
                    <li>Maximum of 3 projects</li>
                    <li>Maximum of 5 tasks by projects</li>
                </ul>
                <p>Free</p>
            </div>
            <div>
                <h2>SuperUser</h2>
                <ul>
                    <li>Unlimited projects</li>
                    <li>Unlimited tasks</li>
                </ul>
                <p>$8,99/month</p>
            </div>
        </section>
    </div>
</body>

</html>