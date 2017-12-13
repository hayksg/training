<?php

namespace Training;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\Router\Http\Regex;
use Zend\Router\Http\Method;
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
                    /*'article' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/article[/:action]',
                            'constraints'    => [
                                'action' => '[a-z]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ArticleController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],*/
                    /*'article' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex'   => '/article(/(?<action>[a-z]+))?',
                            'spec'    => '/%action%',
                            'defaults' => [
                                'controller' => Controller\ArticleController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],*/

                    'article' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/article[/:action]',
                            'constraints'    => [
                                'action' => '[a-z]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ArticleController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],

                    'articleProcess' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/article-process[/:action]',
                            'constraints'    => [
                                'action' => '[a-z]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ArticleController::class,
                                'action'     => 'index',
                            ],
                        ],
                        //'may_terminate' => true,
                        'child_routes' => [
                            'articleGet' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'get',
                                    'defaults' => [
                                        'controller' => Controller\ArticleController::class,
                                        'action'     => 'add',
                                    ],
                                ],
                            ],
                            'articlePost' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'post',
                                    'defaults' => [
                                        'controller' => Controller\ArticleController::class,
                                        'action'     => 'post',
                                    ],
                                ],
                            ],
                        ],
                    ],


                    'shuffle' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/shuffle[/:action]',
                            'constraints'    => [
                                'action' => '[a-z]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ShuffleController::class,
                                'action'     => rand(0, 1) ? 'rand1' : 'rand2',
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
            Controller\ArticleController::class => InvokableFactory::class,
            Controller\ShuffleController::class => InvokableFactory::class,
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
