@extends('layouts.master')
@section('content')
    <!-- Panoul pentru vizualizarea detaliilor partenerului -->
    <div class="panel panel-default">
        <div class="panel-heading">
            View Partner
        </div>
        <div class="panel-body">
            <!-- Buton pentru a reveni la lista de parteneri -->
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('partners.index') }}">Back</a>
            </div>
            <!-- Verifică dacă există date despre partener și le afișează -->


            @if($partner)
                <div class="form-group">
                    @if($partner->logo)
                        <img src="data:image/png;base64,{{ base64_encode($partner->logo) }}" alt="Partner Logo" style="width: 200px; height: auto;">
                    @else
                        No Logo
                    @endif


                </div>
                <div class="form-group">
                    <strong>Name: </strong> {{ $partner->name  }}
                </div>
                <div class="form-group">
                    <strong>Address: </strong> {{ $partner->address  }}
                </div>
                <div class="form-group">
                    <strong>Type: </strong> {{ $partner->partner_type  }}
                </div>
                <div class="form-group">
                    <strong>Contract: </strong> {{ $partner->contract  }}
                </div>
                <div class="form-group">
                    <strong>Contact: </strong> {{ $partner->phone_number  }}
                </div>
                <div class="form-group">
                    <strong>Description: </strong> {{ $partner->description  }}
                </div>


            @else
                <!-- Afișează un mesaj dacă partenerul nu a fost găsit -->
                <p>Partner doesn't exist!</p>
            @endif
        </div>
    </div>
@endsection



