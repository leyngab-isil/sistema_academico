@extends('layouts.app')

@section('content')

    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex justify-content-between">
            <h2>Alumnos</h2>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#crearAlumno"> Crear <i class="fa-solid fa-person-circle-plus"></i></button>
        </div>
        <hr>
        <table class="table mt-5">
            <thead>
                <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Correo</th>
                <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody id="tbody-alumnos">
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="crearAlumno" tabindex="-1" aria-labelledby="crearAlumnoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="Crear formulario">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" placeholder="Luis" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" placeholder="Torres" required>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" placeholder="12345678">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="example@correo.com">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="telefono" placeholder="987654321">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar <i class="fa-solid fa-floppy-disk"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const API = '/api/alumnos'

        document.addEventListener(
            'DOMContentLoaded',
            cargarAlumnos()
        )

        async function cargarAlumnos(){
            const response = await fetch(API)

            const alumnos = await response.json()

            let bodyAlumnos = document.getElementById('tbody-alumnos')

            let html = '';

            alumnos.forEach( alumno => {
                html += `
                    <tr>
                        <td>
                            ${alumno.nombres}
                        </td>
                        <td>
                            ${alumno.apellidos}
                        </td>
                        <td>
                            ${alumno.dni}
                        </td>
                        <td>
                            ${alumno.correo}
                        </td>
                        <td>
                            <button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                `
            })
            bodyAlumnos.innerHTML = html
            console.log(bodyAlumnos)

        }
    </script>
@endsection