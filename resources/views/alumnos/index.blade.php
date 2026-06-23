@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Alumnos</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Correo</th>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody id="tbody-alumnos">
                
            </tbody>
        </table>
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
                            <button class="btn btn-primary">Actualizar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                `
            })
            bodyAlumnos.innerHTML = html
            console.log(bodyAlumnos)

        }
    </script>
@endsection