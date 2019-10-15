{include file='template/header.tpl'}
<form action="modificarCat" method="POST">  
<div class="card-body">
<input name="tipo" id="tipo" class="card-text" value="{$categoria->descripcion}">
<input type="hidden" name="id" id="id" value="{$categoria->id_categoria}">
 <button type="submit" class="btn btn-primary">Guardar</button> 
</div>
</form>
{include file='template/footer.tpl'}