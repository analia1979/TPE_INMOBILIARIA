{include file='template/header.tpl'}

    <div class="card-deck">
        <div class="card">
            <h5 class="card-title">Inmobiliaria</h5>
                <img src="../img/imagen2.jpg" style="max-width: 25rem;" class="card" alt="fondo">
                <div class="card-body">
                    <p class="card-text">{$inmueble->descripcion}</p> 
                    <p class="card-text">({$inmueble->precio})</p>
                    <p class="card-text">({$inmueble->idCategoria})</p>
                </div>
        </div>
    </div>
    {include file='template/footer.tpl'}
        
     