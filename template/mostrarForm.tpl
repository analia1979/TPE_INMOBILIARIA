{include file='template/header.tpl'}    

<div class="container-fluid">
    <h1>Inmobiliaria</h1>
        <div class="row">
            <div class="col">
                <form action="nueva" method="POST">
                    <div class="col form-group">
                            <label>Precio:</label><input name="precio" type="number" class="form-control" id="precio">
                            <label>Categorias:</label><select name="categoria" id="categoria" class="form-control">
                            {foreach $categorias as $categoria}
                                <option value="{$categoria->id_categoria}">{$categoria->descripcion}</option>
                            {/foreach}
                            </select>
                            <label>Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="3" id="descripcion"></textarea>
                            </div>

                    <div class="col">               
                    <button type="submit" class="btn btn-primary">AGREGAR</button>      </div>    
                </form>
            </div>  
        </div>
<div>
<div class="container-fluid">
    <div class=row>            
                      
            {foreach $inmuebles as $inmueble}
                <div class="col-md-3">     
                                        
                        <img src="img/imagen2.jpg" class="img-fluid" alt="fondo">
                        <div class="row">
                            <div class="col">
                                <p>{$inmueble->tipo}</p>
                                {if ($inmueble->vendida==1)}
                                    <p>VENDIDA</p>
                                {else}
                                    <p>EN VENTA</p>
                                {/if} 
                            </div>
                            <div class="col"> 
                                <small><a href="inmueble/{$inmueble->id_inmueble}">VER</a></small>
                                <small><a href="editar/{$inmueble->id_inmueble}">EDITAR</a></small>
                                <small><a href="vendida/{$inmueble->id_inmueble}">VENDIDO</a></small>
                                <small><a href="eliminar/{$inmueble->id_inmueble}">ELIMINAR</a></small> 
                            </div>
                        </div>    
                </div>                
             {/foreach}                               
           
    </div>  
</div>

  
   
 
{include file='template/footer.tpl'}