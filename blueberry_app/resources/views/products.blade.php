@extends('layout')
@section('title', 'Product List')
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
<div class="row">
    <div class="col-md-6"><h3 class="title-2">Product Entries</h3></div>
    <div class="col-md-6">
        <a href="{{route('products.manage-product')}}" class="ad-action edit">
            <i class="fas fa-pen"></i> Add Product
    </a>
    <a href="{{route('products.trash')}}"  class="ad-action delete">
        <i class="fas fa-trash-alt"></i> Go to Trash
    </a>

    </div>
</div>


        </div>
        <hr>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>@php
                   $i=1;
                @endphp
                @foreach($products as $product_item)


                <tr>
                    <th scope="row">{{$i}}</th>
                    <td><img src="{{asset('storage/uploads/'.$product_item->image)}}" width="150px"/></td>
                    <td>{{$product_item->title}}</td>
                    <td>{{$product_item->price}}</td>
                    <td>{{$product_item->stock}}</td>
                    <td>

                        <a href="{{url('products/manage-product')}}/{{$product_item->id}}" class="ad-action edit">
                                <i class="fas fa-pen"></i> Edit
                        </a>
                        <a href="{{url('products/delete/')}}/{{$product_item->id}}"  class="ad-action delete">
                            <i class="fas fa-trash-alt"></i> Trash
                        </a>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp

                @endforeach

            </tbody>
          </table>


    </div>
</div>
<style>
a.ad-action{
    padding: 8px;
    border: 1px solid #0000002b;
    border-radius: 5px;
    margin: 5px;
    text-decoration: none;
}
a.ad-action.edit{
    color:#fff;
    background: green;
}
a.ad-action.delete{
    color:#fff;
    background: red;
}
</style>
@endsection
