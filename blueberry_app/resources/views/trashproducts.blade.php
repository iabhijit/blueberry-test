@extends('layout')
@section('title', 'Trased Product List')
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
    <div class="col-md-6"><h3 class="title-2">Trased Product List</h3></div>
    <div class="col-md-6">
        <a href="{{route('products.manage-product')}}" class="ad-action green">
            <i class="fas fa-pen"></i> Add Product
    </a>
    <a href="{{route('products')}}"  class="ad-action restore">
        <i class="fas fa-trash-alt"></i> Go to Products
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

                        <a href="{{url('products/restore')}}/{{$product_item->id}}" class="ad-action restore">
                            <i class="fas fa-undo"></i> Restore
                        </a>
                        <a href="{{url('products/force-delete/')}}/{{$product_item->id}}"  class="ad-action delete">
                            <i class="fas fa-trash-alt"></i> Delete
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
a.ad-action.green{
    color:#fff;
    background: blue;
}
a.ad-action.restore{
    color:#fff;
    background: green;
}
a.ad-action.delete{
    color:#fff;
    background: red;
}
</style>
@endsection
