@extends('layouts.master')
@section('content')
    <!-- Panoul pentru adăugarea partenerilor -->
    <div class="panel panel-default">
        <div class="panel-heading">Add new Partner</div>
        <div class="panel-body">
            <!-- Verifică și afișează erorile de validare -->
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


            <!-- Formularul pentru adăugarea de parteneri -->
            {{ Form::open(array('route' => 'partners.store','method'=>'POST')) }}


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
                <textarea name="address" class="form-control" rows="3">{{old('address') }}</textarea>
            </div>
            <div class="form-group">
                <label for="partner_type">Type</label>
                <textarea name="partner_type" class="form-control" rows="3">{{old('partner_type') }}</textarea>
            </div>
            <div class="form-group">
                <label for="contract">Contract</label>
                <textarea name="contract" class="form-control" rows="3">{{old('contract') }}</textarea>
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
                <label for="id_event">Id eveniment</label>
                <textarea name="id_event" class="form-control" rows="5">{{old('id_event') }}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Add Partner" class="btn btn-info">
                <a href="{{ route('partners.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
