{include file='template/header.tpl'}    

<div class="container-fluid">
<h1>Inmobiliaria</h1>
    <div class="row">
        <div class="col-sm">
            <form action="nueva" method="POST">
                    <div class="form-group">
                            <label>Precio:</label><input name="precio" type="number" class="form-control">
                            <label>Categorias:</label><select name="categoria"class="form-control">
                            {foreach $categorias as $categoria}
                                <option value="{$categoria->id_categoria}">{$categoria->descripcion}</option>
                            {/foreach}
                            </select>
                            <label>Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="3"></textarea>
                    </div>
                <div class="col-sm">    
                <button type="submit" class="btn btn-primary">AGREGAR</button>
               
            </form>
    </div>        
        
        <div class=row>
            <ul class="list-group mt-4" >
                
                {foreach $inmuebles as $inmueble}
                    <div class="col-sm">               
                        <li class="tarea list-group-item">
                        <h5>En venta</h5>
                        <img src="img/imagen2.jpg" style="max-width: 15rem;" class="card" alt="fondo">
                        <small><a href="inmueble/{$inmueble->id_inmueble}">VER</a></small>
                        <small><a href="editar/{$inmueble->id_inmueble}">EDITAR</a></small>
                        <small><a href="vendida/'{$inmueble->id_inmueble}">VENDIDO</a></small>
                        <small><a href="eliminar/{$inmueble->id_inmueble}">ELIMINAR</a></small></li> 
                    </div>                
               {/foreach}                   
            </ul>
        </div>
  
   
 
{include file='template/footer.tpl'}