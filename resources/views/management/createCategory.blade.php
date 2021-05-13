@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <a href="/management/category" class="list-group-item list-group-item-action"><i class="fas fa-align-justify"></i> Category</a>
                <a href="" class="list-group-item list-group-item-action"> <i class="fas fa-utensils"></i> Menu</a>
                <a href="" class="list-group-item list-group-item-action"><i class="fas fa-receipt"></i> Table</a>
                <a href="" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> User</a>
            </div>
        </div>
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