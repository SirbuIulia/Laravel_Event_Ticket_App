@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Update Event</div>
        <div class="panel-body">
            <!-- Afișare mesaj de eroare în cazul în care există erori de validare -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        <!-- Iterează prin erori și le afișează -->
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Populează câmpurile formularului cu datele corespunzătoare din tabela events -->
            {!! Form::model($event, ['method' => 'PATCH','route' => ['events.update', $event->id]]) !!}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$event->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <textarea name="date" class="form-control" rows="3">{{ $event->date }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <textarea name="location" class="form-control" rows="3">{{ $event->location }}</textarea>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <textarea name="website" class="form-control" rows="3">{{ $event->website }}</textarea>
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <textarea name="topic" class="form-control" rows="3">{{ $event->topic }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Save Changes" class="btn btn-info">
                <a href="{{route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
