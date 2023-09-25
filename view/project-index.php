{{ include('header.php', {title: 'liste de project'}) }}

<main class="project">
    <a class="button-74 sml" href="{{ path }}project/create">Create a New project</a>
    <h1>All projects</h1>
    <table>
        <tr>
            <th>Project name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>Due Date</th>
        </tr>
        {% for project in project %} {#syntaxe de condition#}
        <tr>
            <td><a href="{{path}}project/show/{{project.idProject}}"> {{ project.name }} </a></td>
            <td>{{ project.description }}</td>
            <td>{{ project.startDate }}</td>
            <td>{{ project.dueDate }}</td>
        </tr>
        {% endfor %}
    </table>
</main>
</body>

</html>