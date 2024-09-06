@php
    use Illuminate\Support\Facades\Session;
@endphp
@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Events list
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/events/create" class="btn btn-default">Add new event</a>
                </div>
            </div>


            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">Event</th>
                    <th width="110">Date/Location</th>
                    <th>Website</th>
                    <th width="90">Topic</th>
                    <th width="150">Speakers</th>
                </tr>
                @if (count($events) > 0)
                    @foreach ($events as $key => $event)


                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->date.' '.$event->location }}</td>
                            <td>{{ $event->website }}</td>
                            <td>{{ $event->topic }}</td>
                            <td>
                                @foreach($event->speakers as $speaker)
                                    {{ $speaker->first_name.' '.$speaker->last_name }}
                                    @if(!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-success btn-block" href="{{ route('events.show', $event->id) }}">View</a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-block" href="{{ route('events.edit', $event->id) }}">Edit</a>
                            </td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['event.destroy', $event->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                                {{ Form::close() }}
                            </td>
                            <td>
                                {{--                                <form action="{{ route('tickets.index') }}" method="GET">--}}
                                <form action="{{ route('tickets.index') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <button type="submit" class="btn btn-primary">Buy Tickets</button>
                                </form>





                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Event doesn't exist!</td>
                    </tr>
                @endif
            </table>


            <a style="background-color: #FFFAF0; color: #000;" class="btn btn-secondary" href="{{ route('speakers.index',$event->id) }}">Speakers</a>
            {{-- Buton pentru a accesa lista de speakeri --}}
            <a style="background-color: #FFFAF0; color: #000;" class="btn btn-secondary" href="{{ route('partners.index',$event->id) }}">Partners</a>
            {{-- Buton pentru a accesa lista de parteneri --}}
            <a style="background-color: #FFFAF0; color: #000;" class="btn btn-secondary" href="{{ route('speakers.index',$event->id) }}">Sponsors</a>






        </div>
@endsection




