@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('management.inc.sidebar')
        <div class="col-md-8">
        <i class="fas fa-utensils"></i> Edit Menu
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
            <!-- When we want to upload images, we have to add the attribute enctype to the form -->
            <form action="/management/menu" method="POST" enctype="multipart/form-data">
            <!-- For security reasons, laravel wants you to put @csrf here -->
            @csrf
                <div class="form-group">
                    <label for="name">Menu Name</label>
                    <input type="text" value="{{$menu->name}}" class="form-control" name="name" id="name" placeholder="Menu..."/>
                </div>
                    <label for="price">Menu Price</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text"  value="{{$menu->price}}"   class="form-control" name="price" id="price" aria-label="Amount"/>
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <label for="image">Image</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file"  value="{{$menu->image}}" class="custom-file-input" id="inputGroupFile01" name="image"/>
                        <label for="inputGroupFile01" class="custom-file-label">Choose File</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Menu Description</label>
                    <input type="text" value="{{$menu->description}}" class="form-control" name="description" id="description" placeholder="Description..."/>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$menu->category_id === $category->id ? "selected": ""}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                    <button hrtime type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>

    @endsection