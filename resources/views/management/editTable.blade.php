@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fas fa-receipt"></i> Edit table
            <hr />
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/management/table/{{$table->id}}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="tableName">Table name</label>
                    <input type="text" class="form-control" name="name" value="{{$table->name}}" placeholder="Table..."/>
                    <button hrtime type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>

    @endsection