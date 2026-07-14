@extends('layouts.app')

@section('content')

    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex justify-content-between">
            <h2>Profesores</h2>
            <button class="btn btn-outline-primary" onclick="nuevoProfesor()" data-bs-toggle="modal" data-bs-target="#modalProfesor"> 
                Nuevo Profesor <i class="fa-solid fa-person-circle-plus"></i>
            </button>
        </div>
        @include('profesores.tabla')
    </div>

    @include('profesores.modal')
@endsection


@section('scripts')
@include('profesores.scripts')
@endsection