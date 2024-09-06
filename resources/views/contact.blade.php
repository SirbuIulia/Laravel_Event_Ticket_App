@extends('layouts.master')
@section('content')
<html lang="en">
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #988d8d;
            box-sizing: border-box;
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
        .container-contact100 {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }
        .details-section {
            width: 50%;
            padding: 20px;
            color: #fff;
        }
        .wrap-contact100 {
            width: 100%;
            background: #fff;
            overflow: hidden;
            margin: 20px;
            border-radius: 10px;
            position: relative;
            padding: 62px 45px 30px 45px;
            box-shadow: 0 10px 30px 0 rgba(0, 0, 0, 0.1);
        }
        .contact100-form {
            max-width: 100%;
            width: 100%;
        }
        .contact100-form-title {
            display: block;
            font-family: 'Poppins', sans-serif;
            font-size: 39px;
            color: #333333;
            line-height: 1.2;
            text-align: center;
        }
        .wrap-input100 {
            width: 90%;
            position: relative;
            border-bottom: 2px solid #d9d9d9;
            margin-bottom: 45px;
        }
        .input100 {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            color: #555555;
            line-height: 1.2;
            display: block;
            width: 100%;
            height: 55px;
            background: transparent;
            padding: 0 5px 0 38px;
        }
        .focus-input100 {
            display: block;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #d9d9d9;
            transition: 0.5s;
        }
        .wrap-input100.focus-input100 .focus-input100 {
            width: 100%;
        }
        .symbol-input100 {
            font-size: 15px;
            color: #555555;
            position: absolute;
            display: block;
            transform: translateY(-50%);
            left: 0;
            top: 50%;
        }
        .symbol-input100 i {
            font-size: 18px;
        }
        .alert {
            margin-bottom: 20px;
        }
        .container-contact100-form-btn {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contact100-form-btn {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            color: #fff;
            line-height: 1.2;
            text-transform: uppercase;
            display: inline-block;
            padding: 0 40px;
            height: 50px;
            background-color: #333333;
            border-radius: 25px;
            transition: background-color 0.5s;
            cursor: pointer;
        }
        .contact100-form-btn:hover {
            background-color: #555555;
        }
        .form-section {
            width: 50%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
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
<div class="bg-contact100">
    <div class="container-contact100">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home">Home</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="/events">Events</a>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="/tickets">Tickets</a>
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
        <div class="form-section">
            <div class="wrap-contact100">
                <form action="{{ route('send.email') }}" class="contact100-form validate-form" method="post">
                    @csrf
                    <span class="contact100-form-title">
                  Contact Form
                                           </span>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate = "Name is required">
                        <input class="input100" type="text" name="name" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                     <i class="fa fa-user" aria-hidden="true"></i>
                                           </span>
                        @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                  </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Subject is required">
                        <input class="input100" type="text" name="subject" placeholder="subject">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                                               </span>
                        @error('subject')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Message is required">
                        <textarea class="input100" name="content" placeholder="Message"></textarea>
                        <span class="focus-input100"></span>
                        @error('content')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="container-contact100-form-btn">
                        <button type="submit" class="contact100-form-btn">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    <div class="footer">
        Contact us at: tedx@gmail.com | Phone: 0745397645 | Address: str. Ion Barbu nr.15 Cluj-Napoca
    </div>
</div>
</body>
</html>

