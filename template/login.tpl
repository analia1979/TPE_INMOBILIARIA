{include 'template/header.tpl'}
<div class="row">
    <div' class="col-md">
        <form action="verificarUsuario" method="POST" class="col-md-4">
       
                <h1>{$titulo}</h1>

                <div class="form-group">
                    <label>Usuario (email)</label>
                    <input type="email" name="username" class="form-control" placeholder="Ingrese email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
        '    
                {if $error}
                    <div class="alert alert-danger" role="alert">
                    <h1>{$error}</h1>
                    </div>
                {/if} 

                <button type="submit" class="btn btn-primary">Ingresar</button>       
        </form>
        <form action="registrarUsuario" method="POST" "col-md-2" >
                <h1>{$tituloRegistro}</h1>

                <div class="form-group">
                    <label>Usuario (email)</label>
                    <input type="email" name="username" class="form-control" placeholder="Ingrese email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
        '    
                <button type="submit" class="btn btn-primary">Registarse</button>       
        </form>
    </div>
</div>     
  

{include 'template/footer.tpl'}
