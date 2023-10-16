{{ include('header.php', {title: 'User'}) }}

<main>
    <section>
        <h2>
            User {{ user.username }}
        </h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Privilege</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ user.username }}</td>
                    <td>{{ user.email }}</td>
                    {% if user.privilege_idPri == 1 %}
                    <td>Regular</td>
                    {% elseif user.privilege_idPri == 2 %}
                    <td>SuperUser</td>
                    {% endif %}
                </tr>
            </tbody>
        </table>
        <a class="button-74" href="{{path}}/dashboard/edit/{{user.idUser}}">Update Privilege</a>
    </section>
</main>