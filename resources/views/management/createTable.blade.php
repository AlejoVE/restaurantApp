@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fas fa-receipt"></i> Create table
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
            <form action="/management/table" method="POST">
            <!-- For security reasons, laravel wants you to put @csrf here -->
            @csrf
                <div class="form-group">
                    <label for="tableName">table Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Table..."/>
                    <button hrtime type="submit" class="btn btn-primary mt-3">Save</button>
                </div>
            </form>
        </div>
    </div>

    @endsection