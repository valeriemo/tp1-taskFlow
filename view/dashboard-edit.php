{{ include('header.php', {title: 'User edit'}) }}

<main>
    <div class="grid">
        <h2>Update {{user.username}} privilege</h2>

        <form action="{{path}}dashboard/update" method="POST" class="form">
            <label>
                <input type="hidden" value="{{user.idUser}}" name="idUser">
            </label>
            <label>
                <select name="privilege_idPri">
                    <option>Membership Level</option>
                    {% for privilege in privileges %}
                        {% if privilege.idPri != 3 %}
                        <option value="{{ privilege.idPri }}">{{ privilege.privilege }}</option>
                        {% endif %}
                    {% endfor%}
                </select>
            </label>
            <input type="submit" value="Save">
        </form>

    </div>
</main>