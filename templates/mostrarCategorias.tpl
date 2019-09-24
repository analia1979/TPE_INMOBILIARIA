<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           
            <title>Lista de Categorias</title>
        </head>
        <body>
            <div class="container">
                <h1>Inmobiliaria</h1>

                <form action="nuevaCat" method="POST">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Categorias</label>
                                <input name="nombre" type="text" class="form-control">
                            </div>
                        </div>                      
                    </div>     
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>


                <ul class="list-group mt-4" >
                {foreach $Categorias as $Categoria}
                        <li class="tarea list-group-item">
                        <small><h3>{$Categoria->categoria}</h3><a href="categoria/{$Categoria->id_categoria}">- VER </a></small>
                        <small><a href="eliminar/'{$Categorias->id_categoria}"> - ELIMINAR</a></small></li>
                {/foreach}
               </ul>
            </div>
        </body>
        </html>
