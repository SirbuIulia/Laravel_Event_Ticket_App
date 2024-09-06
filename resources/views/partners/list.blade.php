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


    <!-- Panoul pentru lista de parteneri -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Partners list
        </div>
        <div class="panel-body">
            <!-- Buton pentru adăugarea unui partener nou -->
            <div class="form-group">
                <div class="pull-right">
                    <a href="/partners/create" class="btn btn-default">Add new partner</a>
                </div>
            </div>


            <!-- Tabel pentru afișarea partenerilor existenți -->
            <table class="table table-bordered table-stripped">
                <tr>
                    <th> </th>
                    <th>Partner</th>
                    <th>Address</th>
                    <th>Type</th>

                </tr>
                <!-- Verifică dacă există parteneri de afișat -->
                @if (count($partners) > 0)
                    @foreach ($partners as $key => $partner)
                        <tr>
                            <td>
                                @if($partner->logo)
                                    <img src="data:image/png;base64,{{ base64_encode($partner->logo) }}" alt="Partner Logo" style="max-width: 80px;">
                                @else
                                    No Logo
                                @endif
                            </td>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->address }}</td>
                            <td>{{ $partner->partner_type }}</td>
                            <td>
                                <!-- Butoane pentru acțiunile asupra partenerilor -->
                                <a class="btn btn-success" href="{{ route('partners.show',$partner->id) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('partners.edit',$partner->id) }}">Edit</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['partners.destroy', $partner->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <!-- Mesaj pentru cazul în care nu există parteneri -->
                    <tr>
                        <td colspan="4">Partner doesn't exist!</td>
                    </tr>
                @endif
            </table>


            <!-- Afisează link-urile de paginare -->
            {{$partners->render()}}
        </div>
    </div>
@endsection
