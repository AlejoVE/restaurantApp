@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fas fa-align-justify"></i> Category
            <a href="/management/category/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create category</a>
            <hr />
            @if(Session()->has('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dissmiss="alert">X</button>
                    {{Session()->get('status')}}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td >{{$category->name}}</td>
                        <td >
                            <a href="/management/category/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
                        </td>
                        <td >
                        <!-- The link in the action is coming from php artisan route:list, check delete method -->
                            <form action="/management/category/{{$category->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- To show pagination -->
            {{$categories->links()}}
        </div>
    </div>

    @endsection