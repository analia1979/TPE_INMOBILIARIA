{include 'template/header.tpl'}

 
 <div>
    <ul class="list-group mt-4" >
      {foreach $inmuebles as $inmueble}
              
         <li class="list-group-item">                  
         <h5>En venta</h5>                      
         <a href="inmueble/{$inmueble->id_inmueble}">VER</a>
         <a href="vendida/'{$inmueble->id_inmueble}">VENDIDO</a>
         <a href="eliminar/'{$inmueble->id_inmueble}">ELIMINAR</a>
         </li>                   
      {/foreach}
    </ul>
</div>
{include'template/footer.tpl'} 