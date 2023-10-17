{{ include('header.php', {title: 'Dashboard'}) }}


<main>
    <h1>Dashboard</h1>
    <section>
        <h2>
            Guests Logs
        </h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Ip Address</th>
                    <th>Date</th>
                    <th>Page</th>
                    <th>Show User</th>
                </tr>
            </thead>
            <tbody>
            {% for log in logs %}
                <tr>
                    <td><a href="{{path}}/dashboard/user/{{log.username}}">{{log.username}}</a></td>
                    <td>{{ log.ipAddress }}</td>
                    <td>{{ log.date }}</td>
                    <td>{{ log.pageUrl }}</td>
                    {% if log.username != 'guest' %}
                        <td><a class="button-74" href="{{path}}/dashboard/user/{{log.username}}">Show user</a></td>
                    {% else %}
                        <td>Guest</td>
                    {% endif %}
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </section>
</main>