<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           
            <title>Inmueble</title>
        </head>
        <body>
    <form action="ver" method="POST">
<button name="ver" class="btn btn-primary">Volver</button>
    </form>

    <div class="card-deck">
        <div class="card">
            <h5 class="card-title">Inmobiliaria</h5>
               {* <img src="../img/imagen2.jpg" style="max-width: 25rem;" class="card" alt="fondo"> *}
                <div class="card-body">
                    <p class="card-text">{$inmueble->descripcion}</p> 
                    <p class="card-text">({$inmueble->precio})</p>
                    <p class="card-text">({$inmueble->id_Categoria})</p>
                </div>
        </div>
    </div>
        
        </body
