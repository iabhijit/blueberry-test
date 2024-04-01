@extends('layout')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div style="margin: 10vh 20% 0px 20% ;">
        <div class="row mb-3">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="col-sm-12">
                    <div class="alert alert-danger">{{$error}}</div>
                </div>
            @endforeach
        @endif
        @if(session()->has('error'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">{{session('error')}}</div>
                </div>
        @endif
        @if(session()->has('success'))
        <div class="col-sm-12">
            <div class="alert alert-success">{{session('success')}}</div>
        </div>
        @endif
        </div>
        <div class="card-title">
            @if($id)
                <h3 class="text-center title-2">Update Product</h3>
            @else
                <h3 class="text-center title-2">Add new Product</h3>
            @endif
        </div>
        <hr>
        <form action="{{route('product.manage_product_process')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Product Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="{{$title}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="price" value="{{$price}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>

                <div class="col-sm-10">
                    <input type="file" class="form-control" name="image">
                    @if($id && $image)
                        <img src="{{asset('storage/uploads/'.$image)}}" style="width:150px;margin-top:5px;border:1px solid #ada5a575;border-radius:5px; padding:5px;"/>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="stock" value="{{$stock}}">
                </div>
            </div>

            <input value="{{$id}}" name="id" type="hidden">
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
