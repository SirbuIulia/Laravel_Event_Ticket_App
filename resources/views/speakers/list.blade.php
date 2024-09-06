@php
    use Illuminate\Support\Facades\Session;
@endphp


@extends('layouts.master')
@section('content')
    <!-- Afișează mesajul de succes, dacă există -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Panoul pentru lista de speakeri -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Speakers list
        </div>
        <div class="panel-body">
            <!-- Buton pentru adăugarea unui speaker nou -->
            <div class="form-group">
                <div class="pull-right">
               <a href="/speakers/create" class="btn btn-default">Add new speaker</a>
                </div>
            </div>
            <!-- Tabel pentru afișarea partenerilor existenți -->
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>Speaker</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th width="300"></th>
                </tr>
                <!-- Verifică dacă există speakeri de afișat -->
                @if (count($speakers) > 0)
                    @foreach ($speakers as $key => $speaker)
                        <tr>
                            <td>{{ $speaker->first_name.' '.$speaker->last_name}}</td>
                            <td>{{ $speaker->email }}</td>
                            <td>
                                @if ($speaker->event)
                                    <p>{{ $speaker->event->name }}</p>
                                @else
                                    <p>No event associated with this speaker.</p>
                                @endif


                            </td>
                            <td>
                                <!-- Butoane pentru acțiunile asupra speakerilor -->
                                <a class="btn btn-success" href="{{ route('speakers.show',$speaker->id) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('speakers.edit',$speaker->id) }}">Edit</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['speakers.destroy', $speaker->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Speaker doesn't exist!</td>
                    </tr>
                @endif
            </table>
            {{$speakers->render()}}
        </div>
    </div>
@endsection
