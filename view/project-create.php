{{ include('header.php', {title: 'creer un user'}) }}


<body class="align">
    <div class="grid">
            <h2>New Project</h2>
            <form action="{{path}}project/store" method="POST" class="form">
            <label>
                <input type="text" name="name" placeholder="Project Name" required>
            </label>
            <label>
                <textarea name="description" placeholder="Description" cols="30" rows="10"></textarea>
            </label>
            <label> Starting date
                <input type="date" name="startDate" required>
            </label>
            <label> Due date
                <input type="date" name="dueDate" required>
            </label>
            <input type="hidden" name="user_idUser" value="{{idUser}}">


            <input type="submit" value="Save">
            </form>
    </div>
</body>

</html>
