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
    <!-- Panoul pentru lista de sponsori -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Sponsors list
        </div>
        <div class="panel-body">
            <!-- Buton pentru adăugarea unui sponsor nou -->
            <div class="form-group">
                <div class="pull-right">
                    <a href="/sponsors/create" class="btn btn-default">Add new sponsor</a>
                </div>
            </div>
            <!-- Tabel pentru afișarea sponsorilor existenți -->
            <table class="table table-bordered table-stripped">
                <tr>
                    <th> </th>
                    <th>Sponsor</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th width="300"></th>
                </tr>
                <!-- Verifică dacă există sponsori de afișat -->
                @if (count($sponsors) > 0)
                    @foreach ($sponsors as $key => $sponsor)
                        <tr>
                            <td>  @if($sponsor->logo)
                                    <img src="data:image/png;base64,{{ base64_encode($sponsor->logo) }}" alt="Sponsor Logo" style="max-width: 100px;">
                                @else
                                    No Logo
                                @endif
                            </td>


                            <td>{{ $sponsor->name }}</td>
                            <td>{{ $sponsor->address }}</td>
                            <td>{{ $sponsor->email }}</td>
                            <td>
                                <!-- Butoane pentru acțiunile asupra sponsorilor -->
                                <a class="btn btn-success" href="{{ route('sponsors.show',$sponsor->id) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('sponsors.edit',$sponsor->id) }}">Edit</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['sponsors.destroy', $sponsor->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Sponsor doesn't exist!!</td>
                    </tr>
                @endif
            </table>
            {{$sponsors->render()}}
        </div>
    </div>
@endsection
