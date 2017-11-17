<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Developers\Controller\Index' => 'Developers\Controller\IndexController',
            'Developers\Controller\Soap' => 'Developers\Controller\SoapController'
        ),
    ),

    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/developers[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[a-zA-Z0-9][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Developers\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ), 
            'soap' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/soap',
                    'defaults' => [
                        'controller' => 'Developers\Controller\Soap',
                        'action'     => 'soap',
                    ]
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);