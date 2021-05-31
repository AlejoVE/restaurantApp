@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('management.inc.sidebar')
        <div class="col-md-8">
             <i class="fas fa-receipt"></i>  Table
            <a href="/management/table/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create table</a>
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
                        <th scope="col">Table</th>
                        <th scope="col">Statues</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{$table->id}}</td>
                            <td>{{$table->name}}</td>
                            <td>{{$table->status}}</td>
                            <td><a href="/management/table/{{$table->id}}/edit" class="btn btn-warning">Edit</a></td>
                            <td>delete</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- To show pagination -->
        </div>
    </div>

    @endsection