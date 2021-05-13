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
            <i class="fas fa-align-justify"></i> Category
            <a href="/management/category/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> category</a>
            <hr />

            @if(Session()->has('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dissmiss="alert">X</button>
                    {{Session()->get('status')}}
                </div>
            @endif
        </div>
    </div>

    @endsection