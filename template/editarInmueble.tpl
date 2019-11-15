{include file='template/header.tpl'}

<div class="container-fluid">
<h1>Inmobiliaria</h1>
    <div class="row">
        <div class="col">
           {foreach $imagenes as $imagen}
             <img src={$imagen->path} class="img-fluid">    
           {/foreach}
           
        </div>
        <div class="col">
            <form action="editar" method="POST">
                   {include file='template/formulario.tpl'}
             
                <button type="submit" class="btn btn-primary">Guardar</button>
               
            </form>
        </div>  
    </div>          
        
       
  
   
 
{include file='template/footer.tpl'}