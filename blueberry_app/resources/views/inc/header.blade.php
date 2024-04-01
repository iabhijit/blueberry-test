<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('login')}}">Home</a>
        </li>
        @auth
            <li class="nav-item">
             <a class="nav-link"href="{{route('products.manage-product')}}">Add Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"href="{{route('products')}}">List of Product</a>
               </li>
            <li class="nav-item">
            <a class="nav-link"href="{{route('logout')}}">Logout</a>
          </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('registration')}}">Registration</a>
            </li>
        @endauth


      </ul>


      @auth<span class="navbar-text">{{Auth()->User()->name}}</span>@endauth
    </div>
  </div>
</nav>
