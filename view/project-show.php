{{ include('header.php', {title: 'project'}) }}

<main>
    <section>
        <section class="project">
            <hgroup>
                <h1> {{ project.name }} </h1>
                <p>{{ project.description }} </p>
            </hgroup>
            <p class="button-74"><span>Due date : </span>{{ project.dueDate}}</p>
            <div class="task-container">
                <h4 class="button-74">To do :</h4>
                <!-- <p>No task to display.</p> -->
                <a class="button-74" href="{{path}}task/create/{{project.idProject}}">New task</a>
                <!-- Les conditions ne marchent pas ???  -->
                {% if task|length >= 1 %}
                <table>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Importance</th>
                            <th>Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for taskItem in task %}
                        <tr>
                            <td>{{ taskItem.task }}</td>
                            <td>
                                <span>
                                    {% if taskItem.importance_idImp == 1 %}
                                    High
                                    {% elseif taskItem.importance_idImp == 2 %}
                                    Medium
                                    {% else %}
                                    Low
                                    {% endif %}
                                </span>
                            </td>
                            <td>
                                <a class="button-74" href="{{path}}task/delete/{{taskItem.idTask}}">Remove</a>
                            </td>
                        </tr>
                        {% endfor %}
                    </tbody>
                    {% endif %}
                </table>
            </div>

        </section>
    </section>
    <div class="rangee">
    <a class="button-74" href="{{path}}project/edit/{{project.idProject}}">Edit this project</a>
    </div>

</main>
</body>

</html>