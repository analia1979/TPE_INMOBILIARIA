{include file='template/header.tpl'}
<div class="container">
<h1>Inmobiliaria</h1>
  <div class="row justify-content-md-center" style="background-color: black;">
    <div class="col col-lg-2" style="background-color: blue;">
    </div>
    <div class="col">
            <div class="list-group mt-4">
                {foreach $inmuebles as $inmueble}
                        <div class="tarea list-group-item">
                     <h5>En venta</h5>
                        <img src="../img/imagen2.jpg" style="max-width: 55rem;" class="card" alt="fondo">
                        <small><a href="inmueble/{$inmueble->id_inmueble}">VER</a></small>
                       </div>
                {/foreach}
            </div>
    </div>
    <div class="col col-lg-2" style="background-color: green;">
    </div>
  </div>
</div>
{include file='template/footer.tpl'}


    