<?php

namespace Training;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'training' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/training',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'example' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/example[/:action]',
                            'constraints'    => [
                                'action' => '[a-z]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ExampleController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\IndexController::class => InvokableFactory::class,
            //Controller\IndexController::class => Controller\IndexControllerFactory::class,
            Controller\ExampleController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'training/index/index' => __DIR__ . '/../view/training/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
