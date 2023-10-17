{{ include('header.php', {title: 'Projects board'}) }}

<main>
    <h1>Hi {{user.username}}</h1>

    <h3>Your projects</h3>

    {% if projects == null %}
    <p>No project yet !</p>
    {% else %}
    <div class="liste-projet">
        {% for project in projects %}
        <section class="project boite">
            <a href="{{path}}project/show/{{project.idProject}}">{{project.name}}</a>
        </section>
        {% endfor %}
    </div>
    {% endif %}


    {% if user.privilege_idPri == 1 and nbProjects >= 3 %}
    <p>You have reached the maximum number of projects allowed for your account. Upgrate to SuperUser !</p>
    {% else %}
    <a class="button-74" href="{{path}}project/create/{{user.idUser}}">Create a new project</a>
    {% endif %}
</main>
</body>

</html>