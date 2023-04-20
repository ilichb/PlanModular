<?php
defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;

class plgSystemMiPlugin extends CMSPlugin
{
  protected $autoloadLanguage = true;

  public function onContentPrepare($context, &$article, &$params, $page = 0)
{
  // Comprueba si el contexto es "com_content.article"
  if ($context !== 'com_content.article') {
    return;
  }

  // Carga el contenido del archivo del formulario
  $formPath = __DIR__ . '/tmpl/formulario.php';
  $formContent = file_get_contents($formPath);

  // Agrega el formulario al contenido del artículo
  $article->text .= $formContent;
}

  public function onAjaxMiPlugin()
{
  // Comprobar token de seguridad
  JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

  // Obtener datos del formulario
  $input = JFactory::getApplication()->input;
  $nombre = $input->getString('nombre');
  $opciones = $input->getString('opciones');
  $checkbox = $input->getInt('checkbox', 0);

  // Conectar con la base de datos y guardar los datos
  $db = JFactory::getDbo();
  $query = $db->getQuery(true);
  $columns = array('nombre', 'opciones', 'checkbox');
  $values = array($db->quote($nombre), $db->quote($opciones), (int)$checkbox);
  $query->insert($db->quoteName('#__miplugin_datos'))
        ->columns($db->quoteName($columns))
        ->values(implode(',', $values));
  $db->setQuery($query);
  $db->execute();

  // Comparar datos y generar gráficas
  // ...
}


}