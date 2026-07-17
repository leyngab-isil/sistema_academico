@extends('layouts.app')

@section('content')

    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex justify-content-between">
            <h2>Cursos</h2>
            <button class="btn btn-outline-primary" onclick="nuevoCurso()" data-bs-toggle="modal" data-bs-target="#modalCurso"> 
                Nuevo curso <i class="fa-solid fa-book-bookmark"></i>
            </button>
        </div>
        @include('cursos.tabla')
    </div>

    @include('cursos.modal')
@endsection


@section('scripts')
@include('cursos.scripts')
@endsection