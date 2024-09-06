@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Update sponsor</div>
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
            <!-- Populează câmpurile formularului cu datele din tabela sponsors -->
            {!! Form::model($sponsor, ['method' => 'PATCH','route' => ['sponsors.update', $sponsor->id]]) !!}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$sponsor->name}}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" rows="3">{{ $sponsor->address}}</textarea>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <textarea name="email" class="form-control" rows="3">{{ $sponsor->email}}</textarea>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <textarea name="phone_number" class="form-control" rows="1">{{ $sponsor->phone_number}}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="5">{{ $sponsor->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="contract">Contract</label>
                <textarea name="contract" class="form-control" rows="1">{{ $sponsor->contract}}</textarea>
            </div>
            <div class="form-group">
                <label for="allocated_amount">Allocated Amount</label>
                <textarea name="allocated_amount" class="form-control" rows="1">{{ $sponsor->allocated_amount}}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Save Updates" class="btn btn-info">
                <a href="{{route('sponsors.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
