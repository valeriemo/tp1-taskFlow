{{ include('header.php', {title: 'Edit project'}) }}

<main>
<div class="grid">
        <h1>Task Flow</h1>
        <h2>Update your project</h2>

        <form action="{{path}}project/update" method="POST" class="form">
            <input type="hidden" name="idProject" value="{{ project.idProject }}">
            <label>
                <input type="text" name="name"  value="{{ project.name }}" required>
            </label>
            <label>
                <textarea name="description"  value="{{ project.description }}" cols="30" rows="10">{{ project.description }}</textarea>
            </label>
            <label> Starting date
                <input type="date" name="startDate" value="{{ project.startDate }}" required>
            </label>
            <label> Due date
                <input type="date" name="dueDate" value="{{ project.dueDate }}" required>
            </label>
            <input type="hidden" name="user_idUser" value="{{ project.user_idUser }}">
            <input class="button-74" type="submit" value="Save">
        </form>
    </div>
</main>
</body>

</html>