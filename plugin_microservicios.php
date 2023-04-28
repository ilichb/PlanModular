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
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\Event\SubscriberInterface;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

/** 
 * Todas las funciones deben estar envueltas en una clase 
 *
 * El nombre de la clase debe comenzar con 'PlgSystem' seguido del nombre del complemento. Joomla llama a la clase en función del nombre del complemento, por lo que es muy importante que coincidan 
 */ 

 class PlgSearchPluginMicroservicios extends CMSPlugin implements SubscriberInterface
 {
    //se define la matriz para devolver un array con las areas de busqueda
    // los valores del array son generalmente un string
    public static function getSubscribedEvents(): array
    {
        $areas = [
            'onAfterRender' => 'insertFormulario',
        ];

        return $areas;
    }

    //funcion para insertar el formulario en el body

    public function insertFormulario()
    {
        $app = Factory::getApplication();

        //comprobamos que no se renderize el form en el sitio del administrador
        if($app->isClient('administrator')){
            return;
        }

        //buscamos el body de la aplicacion
        $bufferBody = $app->getBody();

        //inicializamos una salida buffer para que no se mande al Browser la obtencion de la ruta de diseño 
        ob_start();
        //usamos el metodo getLayouthPath de PluginHelper pasandole los parametros del typo de plugin y su nombre
        require PluginHelper::getLayouthPath('system', 'plugin_microservicios');
        //ahora almacenamos el buffer contenido del buffer de salida en una variable
        $form = ob_get_clean();

        //ahora remmplazamos el contenido del body por el de buffer
        $bufferBody = str_replace('</body>', $form . '</body>', $bufferBody);

        //seteamos en el body de la app el contenido del plugin
        $app->setBody($bufferBody);

        //agregamos la ruta del controlador AJAX
        $router = $app->getRouter();
        $router->attachBuildRule(['PlgSystemPluginMicroservicios', 'buildUrl']);

    }

    //metodo que modifica la URL de peticion AJAX 
    public static function buildUrl(&$router, &$uri)
    {
        if($uri->getVar('option') === 'com_ajax' && $uri->getVar('plugin') === 'plugin_microservicios' ){
            $uri->setVar('controler', 'plugin_microservicios');
        }
    }
 };

 // se establece la clase MicroserviciosController para que pueda ser usada
 JLoader::register('MicroserviciosController', JPATH_PLUGINS . '/system/plugin_microservicios/src/controller.php');