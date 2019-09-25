{include file='template/header.tpl'};
{include file='template/footer.tpl'};
       
            <div class="container">
                <h1>Inmobiliaria</h1>

                <form action="nueva" method="POST">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Precio</label>
                                <input name="precio" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Categorias</label>
                                <select name="categoria" class="form-control">
                                {foreach $categorias as $categoria}
                                <option value="{$categoria->id_categoria}">{$categoria->descripcion}</option>           
                                {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea name="descripcion" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>


                <ul class="list-group mt-4" >
                {foreach $inmuebles as $inmueble}
                        <li class="tarea list-group-item">
                  
                     <h5>En venta</h5>
                        {* <img src="../img/imagen2.jpg" style="max-width: 15rem;" class="card" alt="fondo"> *}
                        <small><a href="inmueble/{$inmueble->id_inmueble}">VER</a></small>
                        <small><a href="vendida/'{$inmueble->id_inmueble}">VENDIDO</a></small>
                        <small><a href="eliminar/'{$inmueble->id_inmueble}">ELIMINAR</a></small></li>
                   
                {/foreach}
               </ul>
            </div>
        </body>
    </html>
