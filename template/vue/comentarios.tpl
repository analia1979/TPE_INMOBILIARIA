{literal}
<section id="vue-template-comentarios">
<div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{title}}</h4>
            </div>

            <div v-if="loading" class="card-body">
                Cargando...
            </div>

            <ul v-if="!loading" class="list-group list-group-flush">
               
                <li v-for="comentario in comentarios"  class="list-group-item list-group-item-action"> 
            
                <p>Comentario: {{ comentario.texto }}</p>
                <p>Puntaje: {{ comentario.puntaje }}</p>
                <p>Usuario: {{ comentario.email }}</p>               
                <button v-if="admin==1" type="button" v-on:click="(event)=>{deleteComentario(event,comentario.id_comentario)}">Borrar</button>               
                </li>
                            
            </ul>
      </div>
            <div class="card-footer text-muted">
                {{ title }}
            </div>
        </div>
        <div>
        
        <form v-if="admin==1|| admin==0">
            
        <textarea name="texto" class="form-control" rows="3" id="texto"></textarea>
        <input id="puntaje" type="number">
        <button id="btn-add" type="button" class="btn btn-primary">AGREGAR</button> 
        <form>
        
        </div>
  </section>
  {/literal}