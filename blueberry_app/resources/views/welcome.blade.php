@extends('layout')
@section('title', 'Home')
@section('content')
<div class="container">
    <div style="margin: 10vh 20% 0px 20% ;">


      <h3 class="heading">Product List</h3>
        <div class="container">
           <div class="row product">
            @foreach($products as $product_item)
               <div class="col-md-4 ">
                 <div class="card">
                   <div class="ccc">
                     <p class="text-center"><img src="{{asset('storage/uploads/'.$product_item->image)}}" class="imw"></p>

                   </div>
                   <div class="card-body">
                     <h5  class="text-center">{{$product_item->title}}</h5>
                     <p  class="text-center">Price: ${{$product_item->price}}</p>
                     <p class="text-center">Stock: {{$product_item->stock}} items</p>
                   </div>
                 </div>
               </div>
            @endforeach
           </div>

        </div>

    </div>
</div>
<style>
    .heading{
        text-align: center;
        margin-top: 20px;
        text-decoration: underline;
    }
    .imw{
        width: 65%;
        position: relative;
    }
    .product{
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;
      }

      .overlay {
        position: absolute;
        top: 9;
        bottom: 0;
        left: 0;
        right: 0;
        height: 60%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: #000;
      }

      .ccc:hover .overlay {
        opacity: 0.7;
      }

      .text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
      }
      .cc1{
        width: 82%;
        background: #fff;
        color: #000;
        padding: 4px 8px;
        border: 1px solid #000;
        height: 40px;
        border-radius: 7px;
      }
      @media only screen and (max-width: 553px) {
        .card{
            margin-top: 25px;
        }
      }
      .card{
        border: 1px solid;
        padding: 10px;
        box-shadow: 5px 10px #888888;
      }
</style>
@endsection
