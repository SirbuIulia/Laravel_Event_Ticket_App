<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tedx Events</title>
    <!-- Bootstrap CSS File -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 2 meta tags must come first in the head; any other head
   content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

    <style>
        body {
            background-color: #988d8d;
            color: black;
        }

        .navbar {
            background-color: #555;
            border: none;
            margin-bottom: 0;
            border-radius: 0;
        }

        .navbar-brand, .navbar-nav > li > a {
            color: white !important;
        }
    </style>
</head>
<body>
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
    <head>
        <h1></h1>
    </head>
    @yield('content')
</div>
</body>
</html>
