<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="{$basehref}">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
            
            <link rel="stylesheet" href="css/style.css">
                     <title>{$titulo}</title>
        </head>
  {if isset($user)}  
 <body id="user" data-id={$user->id} data-admin="{$user->admin}"> 
 {else}
  <body id="user" data-id=-1 data-admin=-1>
  {/if} 
  
 
<nav class="navbar navbar-expand-lg navbar-light botonera">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
      <a class="navbar-brand" href="inicio">INICIO</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="propiedades">PROPIEDADES<span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         CATEGORIAS
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
           
          {foreach $categorias as $categoria}                 
           
           <a class="dropdown-item" href="inmueblescategoria/{$categoria->id_categoria}">{$categoria->descripcion}</a>
         {/foreach}  
       </div>   
      </li>
    
      {if isset($user) && isset($user->email) && ($user->admin==1) }
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMINISTRAR</a>
              <div class="dropdown-menu " aria-labelledby="navbarDropdown">         
                  <a class="nav-link" href="admin">PROPIEDADES<span class="sr-only">(current)</span></a>
                  <a class="nav-link" href="verCat">CATEGORIAS<span class="sr-only">(current)</span></a>       
                   <a class="nav-link" href="usuarios">USUARIOS<span class="sr-only">(current)</span></a>     
          </li>
      {/if}
    </ul>
    <form class="form-inline my-2 my-lg-0">
      
    {if isset($user->email)}
      <div class="navbar-nav ml-auto">
            <span class="navbar-text">{$user->email}</span>
            <a class="btn my-2 my-sm-0 btn-secondary" href="logout" role="button">LOGOUT</a>
      </div>
    {else}
       <div class="navbar-nav ml-auto">
          
            <a class="btn my-2 my-sm-0 btn-secondary" href="login" role="button">LOGIN</a>
      </div>
    
    {/if}
    </form>
  </div>

</nav>
