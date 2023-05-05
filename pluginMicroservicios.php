<?php
//primero se inicia con informacion sobre el autor y el plugin

/**
*@package Joomla.Plugin
*@subpackage System.plugin_microservicios
*
*@copyright Copyright (c) 2023 Equipo 2 Andromeda. Todos los derechos reservados.
*@license Lincense
 */

//se evita el acceso directo al documento
defined('_JEXEC') or die('Acceso restringido');

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;
// use Joomla\Event\SubscriberInterface;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Session\Session;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Response\JsonResponse;
/** 
 * Todas las funciones deben estar envueltas en una clase 
 *
 * El nombre de la clase debe comenzar con 'PlgSystem' seguido del nombre del complemento. Joomla llama a la clase en función del nombre del complemento, por lo que es muy importante que coincidan 
 */ 

 class PlgSystemPluginMicroservicios extends CMSPlugin
 {
    public function onContentBeforeDisplay($context, &$article, &$params, $limitstart = 0){
        //buscamos la aplicacion de joomla y la guardamos en una variable
        $app = Factory::getApplication();

        //validamos que el usuario no sea admin
        if($app->isClient('administrator')){
            return;
        }

        $document = Factory::getDocument();
        $document->addStyleSheet('plugins/system/pluginMicroservicios/css/microservicios.css');
        $document->addScript('plugins/system/pluginMicroservicios/js/microservicios.js');

        if($context === 'com_content.article'){
            if(strpos($article->text, '{microserviciosForm}') === false){
                return;
            }

            $article->text = str_replace('{microserviciosForm}', $this->displayForm(), $article->text);
        }

        //opcion para renderizar al final de la pagina
        // //creamos una nueva instancia de la clase FileLayout, la cual, renderiza un diseño de plantilla
        // $layout = new FileLayout('formulario', __DIR__.'/tmpl');
        // $form = $layout->render();

        // $body = $app->getBody();
        // $body = str_replace('</body>', $form.'</body>', $body);
        // $app->setBody($body);
    }

    private function displayForm()
    {
        $layout = new FileLayout('formulario', __DIR__.'/tmpl');
        return $layout->render();
    }

    public function onAjaxPlugin()
    {
        //verificamos el token del formulario
        Session::checkToken() or jexit(Text::_('Token no valido'));

        $app = Factory::getApplicacion();
        $input = $app->input;

        echo $input;

        $data = [
            'select' => $input->get('select', '', 'string'),
            'checkbox' => $input->get('checkbox', [], 'array'),
            'input' => $input->get('input', '', 'string'),
        ];

        require_once __DIR__.'/src/controller.php';
        $result = PluginMicroserviciosDataBase::execute($data);

        
        $app->enqueueMessage('Datos guardados correctamente', 'message');
        echo new JsonResponse($result);

    }
 };