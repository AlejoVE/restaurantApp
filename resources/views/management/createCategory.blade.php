@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fas fa-align-justify"></i> Create Category
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
            <form action="/management/category" method="POST">
            <!-- For security reasons, laravel wants you to put @csrf here -->
            @csrf
                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Category..."/>
                    <button hrtime type="submit" class="btn btn-primary mt-3">Save</button>
                </div>
            </form>
        </div>
    </div>

    @endsection