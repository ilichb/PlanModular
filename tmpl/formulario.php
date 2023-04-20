<form action="index.php" method="post" id="miplugin-form">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" required>

  <label for="opciones">Opciones:</label>
  <select id="opciones" name="opciones">
    <option value="opcion1">Opción 1</option>
    <option value="opcion2">Opción 2</option>
  </select>

  <label for="checkbox">Checkbox:</label>
  <input type="checkbox" id="checkbox" name="checkbox">

  <input type="submit" value="Enviar">
  <input type="hidden" name="option" value="com_ajax">
  <input type="hidden" name="plugin" value="miplugin">
  <input type="hidden" name="format" value="raw">
  <?php echo JHtml::_('form.token'); ?>
</form>