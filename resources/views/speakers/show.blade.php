@extends('layouts.master')
@section('content')
    <!-- Panoul pentru vizualizarea detaliilor speakerului -->
    <div class="panel panel-default">
        <div class="panel-heading">
            View Speaker</div>
        <div class="panel-body">
            <!-- Buton pentru a reveni la lista de speakeri -->
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('speakers.index')  }}">Back</a>
            </div>
            <!-- Verifică dacă există date despre speaker și le afișează -->
            <div class="form-group">
                <strong>Name: </strong> {{ $speaker->first_name.' '.$speaker->last_name}}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $speaker->email  }}
            </div>
            <div class="form-group">
                <strong>Contact: </strong> {{ $speaker->phone_number }}
            </div>
            <div class="form-group">
                <strong>Domain: </strong> {{ $speaker->domain }}
            </div>
            <div class="form-group">
                <strong>Event: </strong>
                @if ($speaker->event)
                    <p>{{ $speaker->event->name }}</p>
                @else
                    <p>No event associated with this speaker.</p>
                @endif
            </div>
        </div>
@endsection
