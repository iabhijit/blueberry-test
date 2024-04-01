@extends('layout')
@section('title', 'login')
@section('content')
<div class="container">
    <div style="margin: 10vh 20% 0px 20% ;">
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
        <h2>Login</h2>
        <form style="width: 100%;" action="{{route('login.post')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>
</div>
@endsection
