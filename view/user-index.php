{{ include('header.php', {title: 'liste de users'}) }}

<main>
<h1>Hi {{user.username}}</h1>
<h2>{{user.idUser}}</h2>

<h3>Your projects</h3>

{% if projects == null %}
<p>No project yet !</p>
{% else %}
<div class="liste-projet">
    {% for project in projects %}
    <section  class="project boite">
    <a href="{{path}}project/show/{{project.idProject}}">{{project.name}}</a>
    </section>
    {% endfor %}
</div>
{% endif %}
<a class="button-74" href="{{path}}project/create/{{user.idUser}}">Create a new project</a>

</main>
</body>

</html>