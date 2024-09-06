@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Add new Events</div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(array('route' => 'events.store','method'=>'POST')) }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"
                          rows="3">{{old('description') }}</textarea>
            </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <textarea name="date" class="form-control" rows="3">{{old('date') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <textarea name="time" class="form-control" rows="3">{{old('time') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <textarea name="location" class="form-control" rows="3">{{old('location') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <textarea name="website" class="form-control" rows="3">{{old('website') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="topic">Topic</label>
                    <textarea name="topic" class="form-control" rows="3">{{old('topic') }}</textarea>
                </div>
            <div class="form-group">
                <input type="submit" value="Add Event" class="btn btn-info">
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
