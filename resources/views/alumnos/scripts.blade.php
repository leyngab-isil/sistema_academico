<script>
    const API = '/api/alumnos'

    document.addEventListener(
        'DOMContentLoaded',
        listarAlumnos()
    )

    async function listarAlumnos() {
        const response = await fetch(API)
        const alumnos = await response.json()

        let bodyAlumnos = document.getElementById('tbody-alumnos')
        let html = '';

        alumnos.forEach(alumno => {
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
                        <button class="btn btn-primary" onclick="editarAlumno(${alumno.id})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger" onclick="eliminarAlumno(${alumno.id})"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            `
        })
        bodyAlumnos.innerHTML = html
    }

    function nuevoAlumno(){
        document.getElementById("tituloModal").innerHTML="Nuevo Alumno";
        document.getElementById("formAlumno").reset();
        document.getElementById("id").value="";
    }

    async function editarAlumno(id){
        const response = await fetch(`${API}/${id}`)
        const alumno = await response.json()

        document.getElementById("tituloModal").innerHTML = "Editar Alumno";
        document.getElementById("id").value = alumno.id;
        document.getElementById("nombres").value = alumno.nombres;
        document.getElementById("apellidos").value = alumno.apellidos;
        document.getElementById("dni").value = alumno.dni;
        document.getElementById("correo").value = alumno.correo;
        document.getElementById("fecha_nacimiento").value = alumno.fecha_nacimiento? alumno.fecha_nacimiento.split("T")[0] : null;
        document.getElementById("telefono").value = alumno.telefono;

        new bootstrap.Modal(document.getElementById("modalAlumno")).show();
    }

    //Formulario para envair los datos para crear o editar
    let formulario = document.getElementById("formAlumno")
    formulario.addEventListener("submit", async function (e) {
        e.preventDefault();
        
        const id = document.getElementById("id").value;
        const url = id === "" ? API : `${API}/${id}`;
        const data = new FormData(formulario);

        if (id !== "") {
            data.append("_method", "PUT");
        }

        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Accept": "application/json"
            },
            body: data
        });

        const resultado = await response.json();

        if (response.ok) {
            formulario.reset();
            document.activeElement.blur();
            const modal = bootstrap.Modal.getOrCreateInstance(
                document.getElementById("modalAlumno")
            );
            modal.hide();
            listarAlumnos();
        }
    })

    async function eliminarAlumno(id) {

        const result = await Swal.fire({
            title: "¿Estás seguro(a)?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33"
        });

    if (result.isConfirmed) {
        const response = await fetch(`${API}/${id}`, {
            method: "DELETE",
            headers: {
                "Accept": "application/json"
            }
        });

        const resultado = await response.json();

        listarAlumnos();

        await Swal.fire({
            title: "¡Eliminado!",
            text: resultado.message,
            icon: "success"
        });
    }

    }
</script>