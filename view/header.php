<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{path}}assets/css/style.css">
</head>

<body>
    <nav>
        <div>
            <a class="emoji" href="{{path}}">&#8962;</a>
            <h1>Taskflow</h1>
        </div>
        {% if guest == 1 %}
        <div>
            <a class="button-74" href="{{path}}login">Login</a>
            <a class="button-74" href="{{path}}user/create">New user</a>
        </div>
        {% else %}
        <div>
            <a class="button-74" href="{{path}}user/index">Project board</a>
            <a class="button-74" href="{{path}}login/logout">Logout</a>
            {% if session.privilege == 3 %}
            <a class="button-74" href="{{path}}dashboard/index">Dashboard</a>
            {% endif %}
        </div>
        {% endif %}

    </nav>