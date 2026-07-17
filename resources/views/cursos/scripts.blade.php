<script>
    const API = '/api/cursos'

    document.addEventListener(
        'DOMContentLoaded',
        listarCursos()
    )

    async function listarCursos() {
        const response = await fetch(API)
        const cursos = await response.json()

        let bodyCursos = document.getElementById('tbody-cursos')
        let html = '';

        cursos.forEach(curso => {
            html += `
                <tr>
                    <td>
                        ${curso.nombre_curso}
                    </td>
                    <td>
                        ${curso.descripcion}
                    </td>
                    <td>
                        ${curso.creditos}
                    </td>
                    <td>
                        <button class="btn btn-primary" onclick="editarCurso(${curso.id})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger" onclick="eliminarCurso(${curso.id})"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            `
        })
        bodyCursos.innerHTML = html
    }

    function nuevoCurso(){
        document.getElementById("tituloModal").innerHTML="Nuevo Curso";
        document.getElementById("formCurso").reset();
        document.getElementById("id").value="";
    }

    async function editarCurso(id){
        
        const response = await fetch(`${API}/${id}`)
        const curso = await response.json()
        console.log(curso)
        document.getElementById("tituloModal").innerHTML = "Editar Curso";
        document.getElementById("id").value = curso.id;
        document.getElementById("nombre_curso").value = curso.nombre_curso;
        document.getElementById("descripcion").value = curso.descripcion;
        document.getElementById("creditos").value = curso.creditos;

        new bootstrap.Modal(document.getElementById("modalCurso")).show();
    }

    //Formulario para envair los datos para crear o editar
    let formulario = document.getElementById("formCurso")
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
                document.getElementById("modalCurso")
            );
            modal.hide();
            listarCursos();
        }
    })

    async function eliminarCurso(id) {

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

            listarCursos();

            await Swal.fire({
                title: "¡Eliminado!",
                text: resultado.message,
                icon: "success"
            });
        }

    }
</script>