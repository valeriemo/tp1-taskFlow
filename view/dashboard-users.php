{{ include('header.php', {title: 'User'}) }}

<main>
    <h1>App Users</h1>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>email</th>
                    <th>Privilege</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for user in users %}
                <tr>
                    <td>{{ user.username }}</td>
                    <td>{{ user.email }}</td>
                    {% if user.privilege_idPri == 1 %}
                    <td>Regular</td>
                    {% elseif user.privilege_idPri == 2 %}
                    <td>SuperUser</td>
                    {% elseif user.privilege_idPri == 3 %}
                    <td>Admin</td>
                    {% endif %}
                    <td><a class="button-74" href="{{path}}/dashboard/edit/{{user.idUser}}">Edit user privilige</a></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </section>
</main>