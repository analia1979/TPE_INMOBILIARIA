 <div class="form-group">
                            <input type="number" class="form-control" name="idInmueble" value="{$inmueble->id_inmueble}" id="idInmueble">
                            <label>Precio:</label><input name="precio" type="number" value="{$inmueble->precio}" id="precio" class="form-control">
                            <label>Categorias:</label><select name="idCategoria"class="form-control" id="idCategoria">
                            {foreach $categorias as $categoria}
                                <option value="{$categoria->id_categoria}"{if $categoria->id_categoria == $inmueble->idCategoria} selected {/if}>{$categoria->descripcion}</option>
                            {/foreach}
                            </select>
                            <label>Descripcion</label>
                            <textarea name="descripcion" class="form-control" id="descripcion"rows="3">{$inmueble->descripcion}</textarea>
</div>