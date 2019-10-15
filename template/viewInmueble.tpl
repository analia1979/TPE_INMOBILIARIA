{include file='template/header.tpl'}
  <div class="container-fluid">
<h1>Inmobiliaria</h1>
  <div class="row">
        <div class="col-4">    
             
             <img src="img/imagen2.jpg" class="img-fluid" alt="fondo">


        </div>
        <div class= "col-4">
                <input type="hidden" class="form-control" name="idInmueble"  value="{$inmueble->id_inmueble}" id="idInmueble">
                <label>Precio: {$inmueble->precio} </label> 
                <label>Categorias: {$inmueble->tipo}</label>
                <label>Descripcion: </label>
                            <textarea name="descripcion" class="form-control" id="descripcion"rows="3">{$inmueble->descripcion}</textarea>
   </div>             

   
    {include file='template/footer.tpl'}
        
     