<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Bootstrap CSS File -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 2 meta tags must come first in the head; any other head
   content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <title> TEDX Events </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('{{ asset("images/imagine.jpeg") }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin: 40px 0 20px;
        }
        h1 {
            margin: 0;
            padding: 0;
            font-size: 35px;
        }
        .navbar{
            background-color: #555;
            border: none;
            margin-bottom: 0;
            border-radius: 0;
            text-align: center;
        }
        .navbar-brand, .navbar-nav > li > a {
            color: white !important;
        }
        .login-container {
            position: absolute;
            top: 10px;
            right: 50px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .dropdown {
            display: none;
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 120px;
            text-align: center;
            border-radius: 5px;
            margin-top: 10px;
        }
        .dropdown li {
            padding: 10px;
            cursor: pointer;
        }
        .dropdown a {
            color: #333;
            text-decoration: none;
        }
        .dropdown a:hover {
            background-color: #f1f1f1;
        }
        .login-container:hover .dropdown {
            display: block;
        }
        .signin {
            background-color: #ffffff;
            color: black;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .login-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>TEDX EVENTS</h1>
</header>

<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/home">Home</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/events">Events</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/partners">Partners</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/sponsors">Sponsors</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/speakers">Speakers</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/tickets">Tickets</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/contact">Contact</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/about">About</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</div>
<script>
    function showDropdown() {
        var dropdownList = document.getElementById('dropdownList');
        dropdownList.style.display = 'block';
    }
    function hideDropdown() {
        var dropdownList = document.getElementById('dropdownList');
        dropdownList.style.display = 'none';
    }
</script>
<div class="footer">
    <p>&copy; 2023 TEDX Events. All rights reserved.</p>
</div>
</body>
</html>
