@extends('layouts.master')
@section('content')
    <!-- Panoul pentru adăugarea speakerilor -->
    <div class="panel panel-default">
        <div class="panel-heading">Add new Speaker</div>
        <div class="panel-body">
            <!-- Verifică și afișează erorile de validare -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>  @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Formularul pentru adăugarea speakerilor -->
            {{ Form::open(array('route' => 'speakers.store','method'=>'POST')) }}

            <div class="form-group">
                <label for="last_name">First Name</label>
                <textarea type="text" name="first_name" class="form-control" >{{old('first_name') }}</textarea>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <textarea type="text" name="last_name" class="form-control"> {{old('last_name') }}</textarea>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <textarea name="email" class="form-control" rows="1">{{old('email') }}</textarea>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <textarea name="phone_number" class="form-control" rows="1">{{old('phone_number') }}</textarea>
            </div>

            <div class="form-group">
                <label for="domain">Domain</label>
                <textarea name="domain" class="form-control" rows="1">{{old('domain') }}</textarea>
            </div>
            <div class="form-group">
                <label for="id_event">ID Eveniment</label>
                <textarea name="id_event" class="form-control" rows="1">{{old('id_event') }}</textarea>
            </div>

{{--            <div class="form-group">--}}
{{--                <label for="event_id">Selectează evenimentul:</label>--}}
{{--                <select name="event_id" id="event_id" class="form-control">--}}
{{--                    <option value="">Alege un eveniment</option>--}}
{{--                    @foreach ($events as $event)--}}
{{--                        <option value="{{ $event->id }}">{{ $event->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="form-group">
                <input type="submit" value="Add Speaker" class="btn btn-info">
                <a href="{{ route('speakers.index') }}" class="btn btn-default">Cancel</a></div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
