{include file='template/header.tpl'}
            <div class="container">
                <h1>Inmobiliaria</h1>                
                <ul class="list-group mt-4" >
                {foreach $usuarios as $usuario}
                        <li class="list-group-item">
                       <h3>{$usuario->email}</h3>
                       <a href="eliminarUsuario/{$usuario->id}">ELIMINAR</a>
                       <br></br>
                       
                        <a href="actualizarUsuario/{$usuario->id}">  
                         {if $usuario->admin == 1 }QUITAR PERMISO ADMIN {else $usuario->admin==0}AGREGAR PERMISO ADMIN{/if}</a>            
                           
                {/foreach}
               </ul>
            </div>
       {include file='template/footer.tpl'}
