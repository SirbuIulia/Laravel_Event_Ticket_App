@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Sponsor</div>
        <div class="panel-body">
            <!-- Buton pentru a reveni la lista de sponsori -->
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('sponsors.index')  }}">Back</a>
            </div>
            <!-- Verifică dacă există date despre sponsor și le afișează -->




            @if($sponsor)
                <div class="form-group">
                    @if($sponsor->logo)
                        <img src="data:image/png;base64,{{ base64_encode($sponsor->logo) }}" alt="Sponsor Logo" style="width: 200px; height: auto;">
                    @else
                        No Logo
                    @endif


                </div>


                <div class="form-group">
                    <strong>Name: </strong> {{ $sponsor->name  }}
                </div>
                <div class="form-group">
                    <strong>Email: </strong> {{ $sponsor->email  }}
                </div>
                <div class="form-group">
                    <strong>Contact: </strong> {{ $sponsor->phone_number  }}
                </div>
                <div class="form-group">
                    <strong>Address: </strong> {{ $sponsor->address  }}
                </div>
                <div class="form-group">
                    <strong>Description: </strong> {{ $sponsor->description  }}
                </div>
                <div class="form-group">
                    <strong>Contract: </strong> {{ $sponsor->contract  }}
                </div>
                <div class="form-group">
                    <strong>Allocated amount: </strong> {{ $sponsor->allocated_amount  }} $
                </div>
                <div class="form-group">
                    <strong>Sponsored event: </strong>
                    @if($sponsor->event)
                        {{ $sponsor->event->name.' , '.$sponsor->event->location }}
                    @else
                        No event is sponsored.
                    @endif
                </div>


            @else
                <!-- Afișează un mesaj dacă sponsorul nu a fost găsit -->
                <p>Sponsor doesn't exist.</p>
            @endif
        </div>
@endsection
