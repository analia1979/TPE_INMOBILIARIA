{include 'template/header.tpl'}

    <form action="verificarUsuario" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario (email)</label>
            <input type="email" name="username" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
       
          {if $error}
            <div class="alert alert-danger" role="alert">
            <h1>{$error}</h1>
            </div>
        {/if} 

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

</div>

{include 'template/footer.tpl'}
