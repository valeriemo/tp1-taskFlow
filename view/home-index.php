{{ include('header.php', {title: 'Welcome'}) }}


<main>
    <div class="grid">
        <h1>Welcome to taskFlow</h1>
        <p>Afficher tout les projets en cours</p>
    </div>

    <section class="project">
        <h2>All projects</h2>
        <table>
            <tr>
                <th>Project name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>Due Date</th>
            </tr>
            {% for project in projects %} {#syntaxe de condition#}
            <tr>
                <td><a href="{{path}}project/show/{{project.idProject}}"> {{ project.name }} </a></td>
                <td>{{ project.description }}</td>
                <td>{{ project.startDate }}</td>
                <td>{{ project.dueDate }}</td>
            </tr>
            {% endfor %}
        </table>
    </section>

</main>
</body>

</html>