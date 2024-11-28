@extends('layouts.template')
@section('content')
<h1 class="text-center mt-4">Bienvenido a nuestro sitio web de Mascotas</h1>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://veterisy.com/wp-content/uploads/2024/03/gato-main-coon.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title
                    ">Gatito 1</h5>
                    <p class="card-text">Gatito muy cariñoso y juguetón.</p>
                    <a href="#" class="btn btn-primary">Adoptar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.pexels.com/photos/1108099/pexels-photo-1108099.jpeg?auto=compress&cs=tinysrgb&w=1200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title
                    ">Perrito</h5>
                    <p class="card-text">Perrito muy juguetón y cariñoso.</p>
                    <a href="#" class="btn btn-primary">Adoptar</a>
                </div>
            </div> 
        </div>  
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2023/01/12/05/32/duck-7713310_1280.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title
                    ">Patito</h5>
                    <p class="card-text">Patito muy juguetón y cariñoso.</p>
                    <a href="#" class="btn btn-primary">Adoptar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection