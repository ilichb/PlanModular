<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Controller\AbstractController;
use Joomla\CMS\Response\JsonResponse;

class MicroserviciosController extends AbstractController
{
    public function execute()
    {
        $input = Factory::getApplication()->input;
        $method = $input->getMethod();

        //verificamos si el formulario envia un metodo post
        if($method !== 'POST'){
            throw new Exception('Method not allowed');
        }

        $plugin = $input->getString('plugin');

        if($plugin !== 'plugin_microservicios'){
            throw new Exception('Invalid Plugin');
        }

        $this->guardar();
    }

    protected function guardar()
    {
        $app = Factory::getApplication();
        $input = $app->input;

        //buscamos los datos del formulario
        $nombre = $input->getString('nombre');
        $email = $input->getString('email');

        //incializamos la conexion a la DB
        $db = Factory::getDBO();
        $query = $db->getQuery(true);

        //columnas de la base de datos
        $columns = ['nombre', 'email'];

        //aseguramos o protegemos los valores
        $values = [$db->quote($nombre), $db->quote($email)];

        //insertamos los valores en la vase de datos
        $query->insert($db->quoteName('Microservicios'))
            ->columns($db->quoteName($columns))
            ->values(implode(',', $values));
        
        $db->setQuery($query);
        $db->execute();

        echo new JsonResponse(['success' => true]);
    }
}