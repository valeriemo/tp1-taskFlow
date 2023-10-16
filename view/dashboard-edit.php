{{ include('header.php', {title: 'User edit'}) }}

<main>
    <div class="grid">
        <h2>Update {{user.username}} privilege</h2>

        <form action="{{path}}user/store" method="POST" class="form">
            <label>
                <input type="hidden" name="username" placeholder="Username" minlength="3" maxlength="20" required value="{{user.username}}">
            </label>
            <label>
                <input type="hidden" name="email" placeholder="Email" maxlength="45" required value="{{user.email}}">
            </label>
            <label>
                <input type="hidden" name="password" placeholder="Password" minlength="8" maxlength="20" required value="{{user.password}}">
            </label>
            <label>
                <select name="privilege_idPri">
                    <option>Membership Level</option>
                    {% for privilege in privileges %}
                    <option name="privilege_idPri" value="{{privilege.idPri}}">{{ privilege.privilege}}</option>
                    {% endfor%}
                </select>
            </label> 
            <input type="submit" value="Save">
        </form>

    </div>
</main>