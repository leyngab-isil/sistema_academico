<script>
    const API = '/api/profesores'

    document.addEventListener(
        'DOMContentLoaded',
        listarProfesores()
    )

    async function listarProfesores() {
        const response = await fetch(API)
        const profesores = await response.json()

        let bodyProfesores = document.getElementById('tbody-profesores')
        let html = '';

        profesores.forEach(profesor => {
            html += `
                <tr>
                    <td>
                        ${profesor.nombres}
                    </td>
                    <td>
                        ${profesor.apellidos}
                    </td>
                    <td>
                        ${profesor.especialidad}
                    </td>
                    <td>
                        ${profesor.correo}
                    </td>
                    <td>
                        <button class="btn btn-primary" onclick="editarProfesor(${profesor.id})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger" onclick="eliminarProfesor(${profesor.id})"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            `
        })
        bodyProfesores.innerHTML = html
    }

    function nuevoProfesor(){
        document.getElementById("tituloModal").innerHTML="Nuevo Profesor";
        document.getElementById("formProfesor").reset();
        document.getElementById("id").value="";
    }

    async function editarProfesor(id){
        const response = await fetch(`${API}/${id}`)
        const profesor = await response.json()

        document.getElementById("tituloModal").innerHTML = "Editar Profesor";
        document.getElementById("id").value = profesor.id;
        document.getElementById("nombres").value = profesor.nombres;
        document.getElementById("apellidos").value = profesor.apellidos;
        document.getElementById("especialidad").value = profesor.especialidad;
        document.getElementById("correo").value = profesor.correo;
        document.getElementById("telefono").value = profesor.telefono;

        new bootstrap.Modal(document.getElementById("modalProfesor")).show();
    }

    //Formulario para envair los datos para crear o editar
    let formulario = document.getElementById("formProfesor")
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
console.log(resultado)
        if (response.ok) {
            formulario.reset();
            document.activeElement.blur();
            const modal = bootstrap.Modal.getOrCreateInstance(
                document.getElementById("modalProfesor")
            );
            modal.hide();
            listarProfesores();
        }
    })

    async function eliminarProfesor(id) {

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

        listarProfesores();

        await Swal.fire({
            title: "¡Eliminado!",
            text: resultado.message,
            icon: "success"
        });
    }

    }
</script>