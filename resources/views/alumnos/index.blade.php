@extends('layouts.app')

@section('content')

    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex justify-content-between">
            <h2>Alumnos</h2>
            <button class="btn btn-outline-primary" onclick="nuevoAlumno()" data-bs-toggle="modal" data-bs-target="#modalAlumno"> 
                Nuevo alumno <i class="fa-solid fa-person-circle-plus"></i>
            </button>
        </div>
        @include('alumnos.tabla')
    </div>

    @include('alumnos.modal')
@endsection


@section('scripts')
@include('alumnos.scripts')
@endsection