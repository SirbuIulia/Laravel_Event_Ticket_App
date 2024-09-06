@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Event
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('events.index')}}">Back</a>
            </div>
            <div class="form-group">
                <strong>Event: </strong> {{ $event->name }}
            </div>
            <div class="form-group">
                <strong>Description: </strong> {{ $event->description }}
            </div>
            <div class="form-group">
                <strong>Topic: </strong> {{ $event->topic }}
            </div>
            <div class="form-group">
                <strong>Speakers: </strong>
                @foreach($event->speakers as $speaker)
                    {{ $speaker->first_name.' '.$speaker->last_name }}
                    @if(!$loop->last)
                        &
                    @endif
                @endforeach
            </div>
            <div class="form-group">
                <strong>Date: </strong> {{ $event->date }}
            </div>
            <div class="form-group">
                <strong>Time: </strong> {{ $event->time }}
            </div>
            <div class="form-group">
                <strong>Location: </strong> {{ $event->location }}
            </div>
            <div class="form-group">
                <strong>WebSite: </strong> {{ $event->website }}
            </div>
            <div class="form-group">
                <strong>Partner: </strong>
                @foreach($event->partners as $partner)
                    <div>
                        @if($partner->logo)
                            <img src="data:image/png;base64,{{ base64_encode($partner->logo) }}" alt="Partner Logo" style="width: 100px; height: auto;">
                        @else
                            No Logo
                        @endif
                        <p>{{ $partner->name }}</p>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <strong>Sponsor: </strong>
                @if($event->sponsor)
                    <div>
                        @if($event->sponsor->logo)
                            <img src="data:image/png;base64,{{ base64_encode($event->sponsor->logo) }}" alt="Sponsor Logo" style="width: 100px; height: auto;">
                        @else
                            No Logo
                        @endif
                        <p>{{ $event->sponsor->name }}</p>
                    </div>
                @else
                    <p>No Sponsor associated with this event.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
