@extends('layouts.master')
@section('content')
    <!-- Panoul pentru modificarea informațiilor partenerului -->
    <div class="panel panel-default">
        <div class="panel-heading"> Update Partner</div>
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


            <!-- Populează câmpurile formularului cu datele din tabela Partners -->
            {!! Form::model($partner, ['method' => 'PATCH','route' => ['partners.update', $partner->id]]) !!}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$partner->name}}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" rows="3">{{ $partner->address}}</textarea>
            </div>
            <div class="form-group">
                <label for="partner_type">Type</label>
                <textarea name="partner_type" class="form-control" rows="3">{{ $partner->partner_type}}</textarea>
            </div>
            <div class="form-group">
                <label for="contract">Contract</label>
                <textarea name="contract" class="form-control" rows="1">{{ $partner->contract}}</textarea>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <textarea name="phone_number" class="form-control" rows="1">{{ $partner->phone_number}}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="5">{{ $partner->description}}</textarea>
            </div>


            <div class="form-group">
                <input type="submit" value="Save Changes" class="btn btn-info">
                <a href="{{route('partners.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
