<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blocked</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">

    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            justify-content: center;
            background: #e6e6e6;
        }
        h1{
            color: red;
            text-transform: uppercase;
            font-family: Muli,sans-serif;
        }
        a{
            display: flex;

        }
    </style>

</head>
<body>

    <h1>You Are Blocked</h1>
    <a class="nav_item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
        <span>Logout</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </a>

</body>
</html>