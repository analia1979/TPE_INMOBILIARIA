{include file='template/head.tpl'}
      
    <form action="ver" method="POST">
<button name="ver" class="btn btn-primary">Volver</button>
    </form>

    <div class="card-deck">
        <div class="card">
            <h5 class="card-title">Inmobiliaria</h5>
               {* <img src="../img/imagen2.jpg" style="max-width: 25rem;" class="card" alt="fondo"> *}
                <div class="card-body">
                    <p class="card-text">{$inmueble->descripcion}</p> 
                    <p class="card-text">({$inmueble->precio})</p>
                    <p class="card-text">({$inmueble->id_Categoria})</p>
                </div>
        </div>
    </div>
  </body>      
      