"use strict"
let id_ = document.querySelector('#inmueble');
let user = document.querySelector('#user');
console.log(id_.dataset.id);
//console.log(user.dataset.admin);
//console.log(user.dataset.id);


let app = new Vue({
    el: "#vue-template-comentarios",
    data: {
        title: "Comentarios",
        loading: false,
        comentarios: [],
        id_inmueble: id_.dataset.id,
        id_usuario: user.dataset.id,
        admin: user.dataset.admin

    },
    methods: {
        deleteComentario: function (event, idComentario) {
            event.preventDefault();
            fetch('api/comentarios/' + idComentario, {
                "method": "DELETE"
            })
                .then(response => response.json())
                .then(json => {
                    getComentarios();
                    alert('exitosa');
                })
                .catch(error => console.log(error));

        }
    }
});

getComentarios();

function getComentarios() {
    // inicia la carga
    app.loading = true;

    fetch("api/inmuebles/" + id_.dataset.id + "/comentarios")
        .then(response => response.json())
        .then(comentarios => {
            app.comentarios = comentarios;
            app.loading = false;

        })
        .catch(error => console.log(error));
}
let btnBorrarComentario = document.querySelector("#btn-add");
if (btnBorrarComentario)

    btnBorrarComentario.addEventListener("click", addComentario);

function addComentario(e) {
    e.preventDefault();
    let puntaje = document.querySelector("#puntaje").value;
    if (puntaje <= 5) {
        let comentario = {
            "texto": document.querySelector("#texto").value,
            "puntaje": document.querySelector("#puntaje").value,
            "id_inmueble_fk": id_.dataset.id,
            "id_usuario_fk": user.dataset.id
        }

        fetch("api/comentarios", {
            "method": "POST",
            "headers": { 'Content-Type': 'application/json' },

            "body": JSON.stringify(comentario),
        })
            .then(e => e.json())
            .then(comentario => {
                console.log(comentario);
                getComentarios()
            }).catch(error => console.log(error))
    }
    else
        alert('El puntaje debe ser menor a 5')
}




