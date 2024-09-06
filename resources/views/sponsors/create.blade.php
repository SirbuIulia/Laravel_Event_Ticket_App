@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Add new Sponsor</div>
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
            <!-- Formularul pentru adăugarea sponsorilor -->
            {{ Form::open(array('route' => 'sponsors.store','method'=>'POST')) }}


            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control" value="{{old('logo') }}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name') }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{old('address') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <textarea name="email" class="form-control" rows="3">{{old('email') }}</textarea>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <textarea name="phone_number" class="form-control" rows="1">{{old('phone_number') }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="5">{{old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="contract">Contract</label>
                <textarea name="contract" class="form-control" rows="2">{{old('contract') }}</textarea>
            </div>
            <div class="form-group">
                <label for="allocated_amount">Allocated Amount</label>
                <textarea name="allocated_amount" class="form-control" rows="1">{{old('allocated_amount') }}</textarea>
            </div>
            <div class="form-group">
                <label for="id_event">ID Eveniment</label>
                <textarea name="id_event" class="form-control" rows="1">{{old('id_event') }}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Add Sponsor" class="btn btn-info">
                <a href="{{ route('sponsors.index') }}" class="btn btn-default">Cancel</a></div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
