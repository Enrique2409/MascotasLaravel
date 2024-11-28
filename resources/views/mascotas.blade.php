@extends('layouts.template')
@section('content')
<div class="container mt-5">
    <h2>Tipos de Animales</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="https://images.pexels.com/photos/1108099/pexels-photo-1108099.jpeg?auto=compress&cs=tinysrgb&w=1200" class="card-img-top" alt="Perros">
                <div class="card-body">
                    <h5 class="card-title">Perros</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="https://veterisy.com/wp-content/uploads/2024/03/gato-main-coon.jpg" class="card-img-top" alt="Gatos">
                <div class="card-body">
                    <h5 class="card-title">Gatos</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="https://www.grupoxcaret.com/es/wp-content/uploads/2021/03/aves-boris.jpg" class="card-img-top" alt="Aves">
                <div class="card-body">
                    <h5 class="card-title">Aves</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4nhvML_CevNa2z2_cGk800ZQBRsMqBJ-hDw&s" class="card-img-top" alt="Roedores">
                <div class="card-body">
                    <h5 class="card-title">Roedores</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="https://content.nationalgeographic.com.es/medio/2022/12/12/reptil-1_5d56e696_221212161719_1280x720.jpg" class="card-img-top" alt="Reptiles">
                <div class="card-body">
                    <h5 class="card-title">Reptiles</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGCMqTcTTh_j81NZA67dnWpUAO1ss81sfoVA&s" class="card-img-top" alt="Caballos">
                <div class="card-body">
                    <h5 class="card-title">Caballos</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <a href="{{ route('formadd') }}" class="btn btn-primary">Agregar Mascota</a>
</div>

@endsection
