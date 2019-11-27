{include file='template/header.tpl'}
<div class="container-fluid">
    <h1>Inmobiliaria</h1>
    <div class="row">
              
          {foreach $inmuebles as $inmueble}
          <div class="col-md-3">
                <h5>{$inmueble->tipo}<h5/>
                {if ($inmueble->vendida==1)}

                  <p>VENDIDA</p>
                {else}
                  <p>EN VENTA</p>
                {/if}
                {if ($inmueble->path)}
                    <img src={$inmueble->path} class="img-fluid" alt="fondo">
                {else}    
                    <img src="" class="img-fluid" alt="no hay imagen">
                {/if}
                <div class="row">
                  <div class="col-md">
                  <p>{$inmueble->descripcion}</p></div>
                  <div class="col-md"><p>Precio: {$inmueble->precio}</p></div>
                  <div class="col-md">
                  <a href="inmueble/{$inmueble->id_inmueble}">VER+</a></div>
                </div>  
            </div>
          {/foreach}     
       
      </div>
</div>

{include file='template/footer.tpl'}


    