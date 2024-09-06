@extends('layouts.master')
@section('content')
    <!-- Panoul pentru modificarea informațiilor partenerului -->
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii speaker</div>
        <div class="panel-body">
            <!-- Verifică și afișează erorile de validare -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Populează câmpurile formularului cu datele din tabela speakers -->
            {!! Form::model($speaker, ['method' => 'PATCH','route' => ['speakers.update', $speaker->id]]) !!}
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{$speaker->first_name}}">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{$speaker->last_name}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <textarea name="email" class="form-control" rows="3">{{ $speaker->email}}</textarea>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{$speaker->phone_number}}">
            </div>

            <div class="form-group">
                <label for="domain">Domain</label>
                <input type="text" name="domain" class="form-control" value="{{$speaker->domain}}">
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
                <input type="submit" value="Save Updates" class="btn btn-info">
                <a href="{{route('speakers.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection


