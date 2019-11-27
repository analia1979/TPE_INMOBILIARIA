 
 <div class=row>
 <div class=" col form-group">
                            <input type="hidden" class="form-control" name="idInmueble"  value="{$inmueble->id_inmueble}" id="idInmueble">
                            <label>Precio:</label><input name="precio" type="number" value="{$inmueble->precio}" id="precio" class="form-control">
                            <label>Categorias:</label><select name="idCategoria"class="form-control" id="idCategoria">
                            {foreach $categorias as $categoria}
                                <option value="{$categoria->id_categoria}"{if $categoria->id_categoria == $inmueble->idCategoria} selected {/if}>{$categoria->descripcion}</option>
                            {/foreach}
                            </select>
                            <label>Descripcion</label>
                            <textarea name="descripcion" class="form-control" id="descripcion"rows="3">{$inmueble->descripcion}</textarea>
</div>
 <div id="carouselExampleIndicators" class="col carousel slide" data-ride="carousel">
            
                <ol class="carousel-indicators">
                  {foreach $imagenes as $key=> $imagen}
                  <li data-target="#carouselExampleIndicators" data-slide-to="{$key}" class="active"></li> 
                  {/foreach}   
                </ol>                
                <div class="carousel-inner min-vw-50">
                  {foreach $imagenes as $key=> $imagen}
                    {if $key==0}
                      <div class="carousel-item active">
                        
                        <img src="{$imagen->path}" class="d-block w-100" alt="{$imagen->path}">
                      </div>  
                    {else}
                    <div class="carousel-item">                  
                        <img src="{$imagen->path}" class="d-block w-100" alt="{$imagen->path}">
                    </div>  
                    {/if}
                  {/foreach}
                </div>  
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
        
        </div>
</div>        