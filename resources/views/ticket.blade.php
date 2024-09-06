@extends('layoutcos')
@section('title', 'Tickets')
@section('content')
    <!-- Container pentru bilete -->
    <div class="container tickets">
        <div class="row">
            @foreach($tickets as $ticket)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>{{$ticket->ticket_type }}</h4>
                            <p><strong>Seat: </strong> {{$ticket->seat }}</p>
                            <p><strong>Price: </strong> {{$ticket->price }}$</p>
                            <!-- Buton pentru adăugarea biletului în coș -->
                            <p class="btn-holder">
                                <a href="{{url('add-to-cart/'.$ticket->code)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Buton pentru revenirea la pagina evenimentelor -->
            <td><a href="{{url('/events') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Events</a></td>
        </div>
    </div>
@endsection

