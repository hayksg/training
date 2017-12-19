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

                    /*'article' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex'   => '/article(/(?<action>[a-z]+)(/(?<id>[0-9]+))?)?',
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
                            'route'    => '/article[/:action][/:id]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ArticleController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],

                    'articleAdd' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/article-add',
                            'constraints'    => [
                                'action' => '[a-z]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ArticleController::class,
                                'action'     => 'index',
                            ],
                        ],
                        'child_routes' => [
                            'addGet' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'get',
                                    'defaults' => [
                                        'controller' => Controller\ArticleController::class,
                                        'action'     => 'add',
                                    ],
                                ],
                            ],
                            'addPost' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'post',
                                    'defaults' => [
                                        'controller' => Controller\ArticleController::class,
                                        'action'     => 'addPost',
                                    ],
                                ],
                            ],
                        ],
                    ],

                    'articleEdit' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/article-edit[/:id]',
                            'constraints'    => [
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ArticleController::class,
                                'action'     => 'index',
                            ],
                        ],
                        'child_routes' => [
                            'editGet' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'get',
                                    'defaults' => [
                                        'controller' => Controller\ArticleController::class,
                                        'action'     => 'edit',
                                    ],
                                ],
                            ],
                            'editPost' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'post',
                                    'defaults' => [
                                        'controller' => Controller\ArticleController::class,
                                        'action'     => 'editPost',
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

                    /*'product' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex'   => '/product(/(?<action>[a-z]+)(/(?<id>[0-9]+))?)?',
                            'spec'    => '/%action%',
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],*/

                    'product' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product[/:action[/:id]]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],

                    'productAdd' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product-add[/:action[/:id]]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                        'child_routes' => [
                            'productAddGet' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'get',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'add',
                                    ],
                                ],
                            ],
                            'productAddPost' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'post',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'addPost',
                                    ],
                                ],
                            ],

                        ],
                    ],

                    'productEdit' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/product-edit[/:action][/:id]',
                            'constraints'    => [
                                'action' => '[a-z]+',
                                'id'     => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => Controller\ProductController::class,
                                'action'     => 'index',
                            ],
                        ],
                        'child_routes' => [
                            'productEditGet' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'get',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'edit',
                                    ],
                                ],
                            ],
                            'productEditPost' => [
                                'type' => Method::class,
                                'options' => [
                                    'verb'    => 'post',
                                    'defaults' => [
                                        'controller' => Controller\ProductController::class,
                                        'action'     => 'editPost',
                                    ],
                                ],
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
            Controller\ShuffleController::class => InvokableFactory::class,
            Controller\ProductController::class => InvokableFactory::class,
            Controller\ArticleController::class => InvokableFactory::class,
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
