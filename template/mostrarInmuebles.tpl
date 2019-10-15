{include file='template/header.tpl'}
<div class="container-fluid">
  <h1>Inmobiliaria</h1>
  <div class="row">
             
     {foreach $inmuebles as $inmueble}
         <div class="col-md-3">
              <h5>En venta</h5>
              <img src="img/imagen2.jpg" class="img-fluid" alt="fondo">
              <small><a href="inmueble/{$inmueble->id_inmueble}">VER</a></small>
          </div>
      {/foreach}     
       
  </div>
  </div>

{include file='template/footer.tpl'}


    