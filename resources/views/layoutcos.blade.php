<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Coș
                    <span class="badge badge-pill badge-danger">{{count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <!-- Afișează numărul total de produse din coș -->
                            <span class="badge badge-pill badge-danger">{{count((array) session('cart')) }}</span>
                        </div>
                        <?php $total = 0 ?>
                            <!-- Calculează totalul comenzii -->
                        @foreach((array) session('cart') as $code => $details)
                                <?php
                                $total += $details['price'] * $details['quantity'];
                                ?>
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <!-- Afișează totalul comenzii -->
                            <p>Total: <span class="text-info">$ {{$total}}</span></p>
                        </div>
                    </div>
                    <!-- Detaliile biletelor din coș -->
                    @if(session('cart'))
                        @foreach(session('cart') as $code => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <!-- Afișează tipul și descrierea biletului -->
                                    <p>{{$details['ticket_type'] }}</p>
                                    <p>{{$details['seat'] }}</p>
                                    <!-- Afișează prețul și cantitatea biletului -->
                                    <span class="price text-info"> ${{$details['price'] }}</span>
                                    <span class="count"> Quantity:{{$details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- Butonul pentru afișarea completă a coșului -->
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{url('cart') }}" class="btn btn-primary btn-block">Show all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container pentru conținutul specific fiecărei pagini -->
<div class="container page">
    @yield('content')
</div>
@yield('scripts')
</body>
</html>
