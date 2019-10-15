{include file='template/header.tpl'}
            <div class="container">
                <h1>Inmobiliaria</h1>

                <form action="nuevaCat" method="POST">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Categorias</label>
                                <input name="nombre" type="text" class="form-control" id="nombre">
                            </div>
                        </div>                      
                    </div>     
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                <ul class="list-group mt-4" >
                {foreach $categorias as $categoria}
                        <li class="list-group-item">
                        <small><h3>{$categoria->descripcion}</h3><a href="categoria/{$categoria->id_categoria}"></a></small>
                        <small><a href="eliminarCat/{$categoria->id_categoria}">ELIMINAR</a></small>
                        <small><a href="editarCat/{$categoria->id_categoria}">EDITAR</a></small></li>
                {/foreach}
               </ul>
            </div>
       {include file='template/footer.tpl'}
